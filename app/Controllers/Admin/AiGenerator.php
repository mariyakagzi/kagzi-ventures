<?php

namespace App\Controllers\Admin;

use App\Libraries\GeminiAiService;
use App\Models\CategoryModel;

class AiGenerator extends BaseAdminController
{
    public function generate()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request']);
        }

        $fieldType   = trim($this->request->getPost('field_type') ?? '');
        $productName = trim($this->request->getPost('product_name') ?? '');
        $categoryId  = (int)($this->request->getPost('category_id') ?? 0);
        $catName     = trim($this->request->getPost('category_name') ?? '');
        $apiKey      = trim($this->request->getPost('api_key') ?? '');

        if ($categoryId > 0 && empty($catName)) {
            $catModel = new CategoryModel();
            $cat = $catModel->find($categoryId);
            if ($cat) {
                $catName = $cat['name'];
            }
        }

        if (empty($apiKey)) {
            $apiKey = env('GEMINI_API_KEY') ?: (getenv('GEMINI_API_KEY') ?: '');
        }

        if (empty($apiKey)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gemini API Key is missing. Please enter your Gemini API Key in the Gemini AI Assistant box (on the right sidebar) or save it in .env.'
            ]);
        } else {
            // Save key to .env if not set or different
            $envPath = FCPATH . '../.env';
            if (file_exists($envPath)) {
                $envContent = file_get_contents($envPath);
                if (strpos($envContent, 'GEMINI_API_KEY') !== false) {
                    $envContent = preg_replace('/GEMINI_API_KEY\s*=\s*.*/', 'GEMINI_API_KEY = \'' . addslashes($apiKey) . '\'', $envContent);
                } else {
                    $envContent .= "\nGEMINI_API_KEY = '" . addslashes($apiKey) . "'\n";
                }
                file_put_contents($envPath, $envContent);
            }
        }

        try {
            $aiService = new GeminiAiService($apiKey);

            if ($fieldType === 'category_description') {
                if (empty($catName)) {
                    return $this->response->setJSON(['success' => false, 'message' => 'Category Name is required to generate AI description.']);
                }
                $generatedText = $aiService->generateCategoryDescription($catName);
            } else {
                if (empty($productName)) {
                    return $this->response->setJSON(['success' => false, 'message' => 'Product Name is required to generate AI content.']);
                }
                $generatedText = $aiService->generateProductField($fieldType, $productName, $catName);
            }

            return $this->response->setJSON([
                'success' => true,
                'text'    => $generatedText
            ]);
        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function saveApiKey()
    {
        $apiKey = trim($this->request->getPost('gemini_api_key') ?? '');
        $envPath = FCPATH . '../.env';

        if (file_exists($envPath)) {
            $envContent = file_get_contents($envPath);
            if (strpos($envContent, 'GEMINI_API_KEY') !== false) {
                $envContent = preg_replace('/GEMINI_API_KEY\s*=\s*.*/', 'GEMINI_API_KEY = \'' . addslashes($apiKey) . '\'', $envContent);
            } else {
                $envContent .= "\nGEMINI_API_KEY = '" . addslashes($apiKey) . "'\n";
            }
            file_put_contents($envPath, $envContent);
        }

        return redirect()->back()->with('success', 'Gemini API Key saved successfully!');
    }
}
