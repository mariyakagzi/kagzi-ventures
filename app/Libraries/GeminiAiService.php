<?php

namespace App\Libraries;

use CodeIgniter\Config\Services;

class GeminiAiService
{
    protected string $apiKey;
    protected string $model;

    public function __construct(?string $apiKey = null, ?string $model = null)
    {
        $defaultKey = '';
        $defaultModel = 'qwen/qwen3-coder';

        if ($apiKey && trim($apiKey) !== '') {
            $this->apiKey = trim($apiKey);
        } else {
            $configKey = config('App')->geminiApiKey ?? '';
            $envKey    = env('GEMINI_API_KEY') ?: (getenv('GEMINI_API_KEY') ?: '');
            $this->apiKey = !empty($configKey) ? $configKey : (!empty($envKey) ? $envKey : $defaultKey);
        }

        if ($model && trim($model) !== '') {
            $this->model = trim($model);
        } else {
            $configModel = config('App')->aiModelName ?? '';
            $envModel    = env('AI_MODEL_NAME') ?: (getenv('AI_MODEL_NAME') ?: '');
            $this->model = !empty($configModel) ? $configModel : (!empty($envModel) ? $envModel : $defaultModel);
        }
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function generateContent(string $prompt): string
    {
        if (empty($this->apiKey)) {
            throw new \Exception('AI API Key is not configured.');
        }

        if (strpos($this->apiKey, 'sk-or-v1-') === 0 || strpos($this->model, '/') !== false) {
            return $this->generateOpenRouter($prompt);
        }

        return $this->generateGeminiDirect($prompt);
    }

    protected function generateOpenRouter(string $prompt): string
    {
        $url = 'https://openrouter.ai/api/v1/chat/completions';
        $client = Services::curlrequest();

        $payload = [
            'model' => $this->model,
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt
                ]
            ]
        ];

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type'  => 'application/json',
                    'HTTP-Referer'  => 'http://localhost:8085',
                    'X-Title'       => 'Kagzi Ventures'
                ],
                'json' => $payload,
                'http_errors' => false,
                'timeout' => 60
            ]);

            $statusCode = $response->getStatusCode();
            $body = json_decode($response->getBody(), true);

            if ($statusCode === 200 && !empty($body['choices'][0]['message']['content'])) {
                return trim($body['choices'][0]['message']['content']);
            }

            $errorMsg = $body['error']['message'] ?? ('HTTP Error Code: ' . $statusCode);
            throw new \Exception('OpenRouter API Error: ' . $errorMsg);
        } catch (\Throwable $e) {
            throw new \Exception('AI Generation Error: ' . $e->getMessage());
        }
    }

    protected function generateGeminiDirect(string $prompt): string
    {
        $targetModel = 'gemini-flash-latest';
        $url = 'https://generativelanguage.googleapis.com/v1beta/models/' . $targetModel . ':generateContent?key=' . $this->apiKey;

        $lastError = '';
        $client = Services::curlrequest();

        $payload = [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ],
            'generationConfig' => [
                'temperature'     => 0.7,
                'maxOutputTokens' => 1024
            ]
        ];

        for ($attempt = 1; $attempt <= 3; $attempt++) {
            try {
                $response = $client->post($url, [
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ],
                    'json' => $payload,
                    'http_errors' => false,
                    'timeout' => 60
                ]);

                $statusCode = $response->getStatusCode();
                $body = json_decode($response->getBody(), true);

                if ($statusCode === 200 && !empty($body['candidates'][0]['content']['parts'][0]['text'])) {
                    return trim($body['candidates'][0]['content']['parts'][0]['text']);
                }

                if (isset($body['error']['message'])) {
                    $lastError = $body['error']['message'];
                } else {
                    $lastError = 'HTTP Error Code: ' . $statusCode;
                }

                if ($statusCode === 503 && $attempt < 3) {
                    sleep(2);
                    continue;
                }
            } catch (\Throwable $ex) {
                $lastError = $ex->getMessage();
            }
        }

        if (strpos($lastError, 'Quota exceeded') !== false || strpos($lastError, '429') !== false || strpos($lastError, 'RESOURCE_EXHAUSTED') !== false) {
            preg_match('/retry in ([\d\.]+)s/i', $lastError, $matches);
            $waitTime = isset($matches[1]) ? ceil((float)$matches[1]) : 30;
            throw new \Exception("AI Free Tier Rate Limit reached. Please wait {$waitTime} seconds and try again.");
        }

        if (strpos($lastError, 'high demand') !== false || strpos($lastError, '503') !== false) {
            throw new \Exception('AI API is temporarily busy. Please click "Generate with AI" again in 5 seconds.');
        }

        throw new \Exception('Gemini API Error: ' . $lastError);
    }

    public function generateProductField(string $fieldType, string $productName, string $categoryName = '', string $context = ''): string
    {
        $prompt = '';

        switch ($fieldType) {
            case 'short_description':
                $prompt = "Write a compelling, concise 2-3 sentence e-commerce short description for the product named \"{$productName}\" in the category \"{$categoryName}\". Keep it engaging, benefit-driven, and ready for an online catalog.";
                break;

            case 'features':
                $prompt = "Generate 4-6 key features/bullet points for an e-commerce product named \"{$productName}\" (Category: \"{$categoryName}\"). Each feature should start with a dash (-) or dot (•), highlighting quality, utility, durability, and practical design.";
                break;

            case 'specifications':
                $prompt = "Create technical specifications for an e-commerce product named \"{$productName}\" (Category: \"{$categoryName}\"). Format strictly as key-value lines with a colon separator, like:\nMaterial: Premium Material\nDimensions: Standard Size\nWeight: 450g\nWarranty: 1 Year Manufacturer Warranty\nCountry of Origin: India\nDo not include intro/outro conversational text.";
                break;

            case 'description':
                $prompt = "Write a comprehensive, professional, high-converting full description for an e-commerce product named \"{$productName}\" (Category: \"{$categoryName}\"). Explain product overview, design craftsmanship, daily usage scenarios, and reasons why customers will love it.";
                break;

            default:
                $prompt = "Write helpful e-commerce content for product \"{$productName}\" regarding \"{$fieldType}\".";
                break;
        }

        if (!empty($context)) {
            $prompt .= "\nAdditional context provided by user: {$context}";
        }

        return $this->generateContent($prompt);
    }

    public function generateCategoryDescription(string $categoryName): string
    {
        $prompt = "Write an engaging, 3-4 sentence overview description for an e-commerce category named \"{$categoryName}\" for Kagzi Ventures. Highlight the range of products, quality assurance, utility, and convenience for customers browsing this collection.";

        return $this->generateContent($prompt);
    }
}
