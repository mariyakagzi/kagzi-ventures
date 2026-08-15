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

        $featuredProducts   = $productModel->getFeaturedProducts(8);
        $trendingProducts   = $productModel->getTrendingProducts(8);
        $bestSellerProducts = $productModel->getBestSellerProducts(8);
        $allCategories      = $categoryModel->getActiveCategories();

        $homeCategories       = $categoryModel->getHomeCategories();
        $homeCategorySections = [];

        foreach ($homeCategories as $hCat) {
            $catProducts = $productModel->getHomeCategoryProducts((int)$hCat['id'], 8);
            if (!empty($catProducts)) {
                $homeCategorySections[] = [
                    'category' => $hCat,
                    'products' => $catProducts,
                ];
            }
        }

        $data = [
            'title'                => 'Kagzi Ventures - Home',
            'featuredProducts'     => $featuredProducts,
            'trendingProducts'     => $trendingProducts,
            'bestSellerProducts'   => $bestSellerProducts,
            'allCategories'        => $allCategories,
            'homeCategorySections' => $homeCategorySections,
        ];

        return view('home', $data);
    }
}
