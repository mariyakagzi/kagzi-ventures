<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Product extends BaseController
{
    public function detail(string $slug)
    {
        $productModel  = new ProductModel();
        $categoryModel = new CategoryModel();

        $product = $productModel->getProductBySlug($slug);

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Product not found: ' . $slug);
        }

        $allCategories   = $categoryModel->getActiveCategories();
        $relatedProducts = $productModel->getRelatedProducts((int)$product['category_id'], (int)$product['id'], 4);

        // Decode additional images array if present
        $extraImages = [];
        if (!empty($product['images'])) {
            $decoded = json_decode($product['images'], true);
            if (is_array($decoded)) {
                $extraImages = $decoded;
            }
        }

        $data = [
            'title'           => esc($product['name']) . ' - Kagzi Ventures',
            'product'         => $product,
            'extraImages'     => $extraImages,
            'allCategories'   => $allCategories,
            'relatedProducts' => $relatedProducts,
        ];

        return view('product/detail', $data);
    }
}
