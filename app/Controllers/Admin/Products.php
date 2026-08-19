<?php

namespace App\Controllers\Admin;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Products extends BaseAdminController
{
    public function index()
    {
        $productModel = new ProductModel();
        $products     = $productModel->select('products.*, categories.name as category_name')
                                     ->join('categories', 'categories.id = products.category_id', 'left')
                                     ->orderBy('products.id', 'DESC')
                                     ->findAll();

        $data = [
            'title'    => 'Manage Products - Kagzi Ventures Admin',
            'products' => $products,
        ];

        return view('admin/products/index', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $categories    = $categoryModel->orderBy('name', 'ASC')->findAll();

        $data = [
            'title'      => 'Add New Product - Kagzi Ventures Admin',
            'categories' => $categories,
        ];

        return view('admin/products/create', $data);
    }

    public function store()
    {
        $productModel = new ProductModel();

        $name = trim($this->request->getPost('name'));
        $slug = url_title($name, '-', true);

        // Ensure unique slug
        $existing = $productModel->where('slug', $slug)->first();
        if ($existing) {
            $slug .= '-' . time();
        }

        $mainImagePath = 'assets/images/products/product-1.jpg'; // default fallback
        $file = $this->request->getFile('main_image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/products/', $newName);
            $mainImagePath = 'uploads/products/' . $newName;
        }

        $videoPath = null;
        $videoFile = $this->request->getFile('video');
        if ($videoFile && $videoFile->isValid() && !$videoFile->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/products/videos/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $newVideoName = $videoFile->getRandomName();
            $videoFile->move($uploadDir, $newVideoName);
            $videoPath = 'uploads/products/videos/' . $newVideoName;
        } elseif (!empty($this->request->getPost('video_url'))) {
            $videoPath = trim($this->request->getPost('video_url'));
        }

        $galleryImages = [];
        $galleryFiles  = $this->request->getFileMultiple('images') ?? [];
        if (!empty($galleryFiles)) {
            $uploadDir = FCPATH . 'uploads/products/gallery/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            foreach ($galleryFiles as $imgFile) {
                if ($imgFile && $imgFile->isValid() && !$imgFile->hasMoved()) {
                    $newImgName = $imgFile->getRandomName();
                    $imgFile->move($uploadDir, $newImgName);
                    $galleryImages[] = 'uploads/products/gallery/' . $newImgName;
                }
            }
        }

        $data = [
            'name'              => $name,
            'slug'              => $slug,
            'category_id'       => (int)$this->request->getPost('category_id'),
            'sku'               => trim($this->request->getPost('sku')),
            'price'             => (float)$this->request->getPost('price'),
            'sale_price'        => $this->request->getPost('sale_price') ? (float)$this->request->getPost('sale_price') : null,
            'stock_quantity'    => (int)$this->request->getPost('stock_quantity'),
            'short_description' => trim($this->request->getPost('short_description')),
            'features'          => trim($this->request->getPost('features')),
            'specifications'    => trim($this->request->getPost('specifications')),
            'description'       => trim($this->request->getPost('description')),
            'main_image'        => $mainImagePath,
            'images'            => !empty($galleryImages) ? json_encode($galleryImages) : null,
            'video'             => $videoPath,
            'featured'          => $this->request->getPost('featured') ? 1 : 0,
            'is_trending'       => $this->request->getPost('is_trending') ? 1 : 0,
            'is_home_category'  => $this->request->getPost('is_home_category') ? 1 : 0,
            'shitabi'           => $this->request->getPost('shitabi') ? 1 : 0,
            'status'            => $this->request->getPost('status') ? 1 : 0,
        ];

        $productModel->insert($data);

        return redirect()->to(base_url('admin/products'))->with('success', 'Product "' . esc($name) . '" created successfully!');
    }

    public function edit(int $id)
    {
        $productModel  = new ProductModel();
        $categoryModel = new CategoryModel();

        $product = $productModel->find($id);
        if (!$product) {
            return redirect()->to(base_url('admin/products'))->with('error', 'Product not found.');
        }

        $categories = $categoryModel->orderBy('name', 'ASC')->findAll();

        $data = [
            'title'      => 'Edit Product - ' . esc($product['name']),
            'product'    => $product,
            'categories' => $categories,
        ];

        return view('admin/products/edit', $data);
    }

    public function update(int $id)
    {
        $productModel = new ProductModel();

        $product = $productModel->find($id);
        if (!$product) {
            return redirect()->to(base_url('admin/products'))->with('error', 'Product not found.');
        }

        $name = trim($this->request->getPost('name'));
        $slug = url_title($name, '-', true);

        // Ensure unique slug except current
        $existing = $productModel->where('slug', $slug)->where('id !=', $id)->first();
        if ($existing) {
            $slug .= '-' . time();
        }

        $mainImagePath = $product['main_image'];
        $file = $this->request->getFile('main_image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/products/', $newName);
            $mainImagePath = 'uploads/products/' . $newName;
        }

        $videoPath = $product['video'] ?? null;
        $videoFile = $this->request->getFile('video');
        if ($videoFile && $videoFile->isValid() && !$videoFile->hasMoved()) {
            $uploadDir = FCPATH . 'uploads/products/videos/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $newVideoName = $videoFile->getRandomName();
            $videoFile->move($uploadDir, $newVideoName);
            $videoPath = 'uploads/products/videos/' . $newVideoName;
        } elseif ($this->request->getPost('remove_video')) {
            $videoPath = null;
        } elseif (!empty($this->request->getPost('video_url'))) {
            $videoPath = trim($this->request->getPost('video_url'));
        }

        $galleryImages = [];
        if (!empty($product['images'])) {
            $decoded = json_decode($product['images'], true);
            if (is_array($decoded)) {
                $galleryImages = $decoded;
            }
        }

        $removeImages = $this->request->getPost('remove_images') ?? [];
        if (!empty($removeImages) && is_array($removeImages)) {
            $galleryImages = array_values(array_diff($galleryImages, $removeImages));
            foreach ($removeImages as $rmPath) {
                $fullPath = FCPATH . ltrim($rmPath, '/');
                if (is_file($fullPath)) {
                    @unlink($fullPath);
                }
            }
        }

        $newGalleryFiles = $this->request->getFileMultiple('images') ?? [];
        if (!empty($newGalleryFiles)) {
            $uploadDir = FCPATH . 'uploads/products/gallery/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            foreach ($newGalleryFiles as $imgFile) {
                if ($imgFile && $imgFile->isValid() && !$imgFile->hasMoved()) {
                    $newImgName = $imgFile->getRandomName();
                    $imgFile->move($uploadDir, $newImgName);
                    $galleryImages[] = 'uploads/products/gallery/' . $newImgName;
                }
            }
        }

        $updateData = [
            'name'              => $name,
            'slug'              => $slug,
            'category_id'       => (int)$this->request->getPost('category_id'),
            'sku'               => trim($this->request->getPost('sku')),
            'price'             => (float)$this->request->getPost('price'),
            'sale_price'        => $this->request->getPost('sale_price') ? (float)$this->request->getPost('sale_price') : null,
            'stock_quantity'    => (int)$this->request->getPost('stock_quantity'),
            'short_description' => trim($this->request->getPost('short_description')),
            'features'          => trim($this->request->getPost('features')),
            'specifications'    => trim($this->request->getPost('specifications')),
            'description'       => trim($this->request->getPost('description')),
            'main_image'        => $mainImagePath,
            'images'            => !empty($galleryImages) ? json_encode(array_values($galleryImages)) : null,
            'video'             => $videoPath,
            'featured'          => $this->request->getPost('featured') ? 1 : 0,
            'is_trending'       => $this->request->getPost('is_trending') ? 1 : 0,
            'is_home_category'  => $this->request->getPost('is_home_category') ? 1 : 0,
            'shitabi'           => $this->request->getPost('shitabi') ? 1 : 0,
            'status'            => $this->request->getPost('status') ? 1 : 0,
        ];

        $productModel->update($id, $updateData);

        return redirect()->to(base_url('admin/products'))->with('success', 'Product "' . esc($name) . '" updated successfully!');
    }

    public function delete(int $id)
    {
        $productModel = new ProductModel();
        $product      = $productModel->find($id);

        if ($product) {
            $productModel->delete($id);
            return redirect()->to(base_url('admin/products'))->with('success', 'Product deleted successfully!');
        }

        return redirect()->to(base_url('admin/products'))->with('error', 'Product not found.');
    }
}
