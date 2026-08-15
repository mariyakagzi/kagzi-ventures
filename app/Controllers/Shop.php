<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Shop extends BaseController
{
    public function index(?string $categorySlug = null)
    {
        $productModel  = new ProductModel();
        $categoryModel = new CategoryModel();

        // Get query parameters
        $catParam    = $this->request->getGet('category') ?? $categorySlug;
        $searchQuery = $this->request->getGet('q');
        $sort        = $this->request->getGet('sort') ?? 'default';

        $allCategories = $categoryModel->getActiveCategories();
        $currentCategory = null;

        if (!empty($catParam)) {
            $currentCategory = $categoryModel->where('slug', $catParam)->where('status', 1)->first();
        }

        $result = $productModel->getProductsPaginated($catParam, $searchQuery, $sort, 12);
        $featuredProducts = $productModel->getFeaturedProducts(3);

        $data = [
            'title'           => $currentCategory ? esc($currentCategory['name']) . ' - Kagzi Ventures' : 'Shop Catalog - Kagzi Ventures',
            'allCategories'   => $allCategories,
            'currentCategory' => $currentCategory,
            'catParam'        => $catParam,
            'searchQuery'     => $searchQuery,
            'sort'            => $sort,
            'products'        => $result['products'],
            'pager'           => $result['pager'],
            'featuredProducts'=> $featuredProducts,
        ];

        return view('shop/index', $data);
    }
}
