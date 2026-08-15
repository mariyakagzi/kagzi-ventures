<?php

namespace App\Controllers\Admin;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Dashboard extends BaseAdminController
{
    public function index()
    {
        $productModel  = new ProductModel();
        $categoryModel = new CategoryModel();

        $totalProducts   = $productModel->countAllResults();
        $totalCategories = $categoryModel->countAllResults();
        $featuredCount   = $productModel->where('featured', 1)->countAllResults();
        $recentProducts  = $productModel->select('products.*, categories.name as category_name')
                                        ->join('categories', 'categories.id = products.category_id', 'left')
                                        ->orderBy('products.id', 'DESC')
                                        ->findAll(5);

        $data = [
            'title'           => 'Admin Dashboard - Kagzi Ventures',
            'totalProducts'   => $totalProducts,
            'totalCategories' => $totalCategories,
            'featuredCount'   => $featuredCount,
            'recentProducts'  => $recentProducts,
        ];

        return view('admin/dashboard/index', $data);
    }
}
