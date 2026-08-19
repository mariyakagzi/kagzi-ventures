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
        $apiKey      = env('GEMINI_API_KEY') ?: (getenv('GEMINI_API_KEY') ?: '');

        if ($categoryId > 0 && empty($catName)) {
            $catModel = new CategoryModel();
            $cat = $catModel->find($categoryId);
            if ($cat) {
                $catName = $cat['name'];
            }
        }

        if (empty($apiKey)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'AI API Key is not configured. Please set GEMINI_API_KEY in the .env file.'
            ]);
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
}
