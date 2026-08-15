<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Home extends BaseController
{
    public function index(): string
    {
        $productModel  = new ProductModel();
        $categoryModel = new CategoryModel();

        $featuredProducts = $productModel->getFeaturedProducts(8);
        $trendingProducts = $productModel->getTrendingProducts(8);
        $allCategories    = $categoryModel->getActiveCategories();

        $data = [
            'title'            => 'Kagzi Ventures - Home',
            'featuredProducts' => $featuredProducts,
            'trendingProducts' => $trendingProducts,
            'allCategories'    => $allCategories,
        ];

        return view('home', $data);
    }
}
