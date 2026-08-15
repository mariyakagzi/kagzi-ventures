<?php

namespace App\Controllers\Admin;

use App\Models\CategoryModel;

class Categories extends BaseAdminController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $categories    = $categoryModel->orderBy('id', 'DESC')->findAll();

        $data = [
            'title'      => 'Manage Categories - Kagzi Ventures Admin',
            'categories' => $categories,
        ];

        return view('admin/categories/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Category - Kagzi Ventures Admin',
        ];

        return view('admin/categories/create', $data);
    }

    public function store()
    {
        $categoryModel = new CategoryModel();

        $name = trim($this->request->getPost('name'));
        $slug = url_title($name, '-', true);

        $existing = $categoryModel->where('slug', $slug)->first();
        if ($existing) {
            $slug .= '-' . time();
        }

        $imagePath = 'assets/images/demoes/demo1/cats/cat-1.jpg';
        $file      = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/categories/', $newName);
            $imagePath = 'uploads/categories/' . $newName;
        }

        $data = [
            'name'        => $name,
            'slug'        => $slug,
            'description' => trim($this->request->getPost('description')),
            'image'       => $imagePath,
            'status'      => $this->request->getPost('status') ? 1 : 0,
        ];

        $categoryModel->insert($data);

        return redirect()->to(base_url('admin/categories'))->with('success', 'Category "' . esc($name) . '" created successfully!');
    }

    public function edit(int $id)
    {
        $categoryModel = new CategoryModel();
        $category      = $categoryModel->find($id);

        if (!$category) {
            return redirect()->to(base_url('admin/categories'))->with('error', 'Category not found.');
        }

        $data = [
            'title'    => 'Edit Category - ' . esc($category['name']),
            'category' => $category,
        ];

        return view('admin/categories/edit', $data);
    }

    public function update(int $id)
    {
        $categoryModel = new CategoryModel();

        $category = $categoryModel->find($id);
        if (!$category) {
            return redirect()->to(base_url('admin/categories'))->with('error', 'Category not found.');
        }

        $name = trim($this->request->getPost('name'));
        $slug = url_title($name, '-', true);

        $existing = $categoryModel->where('slug', $slug)->where('id !=', $id)->first();
        if ($existing) {
            $slug .= '-' . time();
        }

        $imagePath = $category['image'];
        $file      = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/categories/', $newName);
            $imagePath = 'uploads/categories/' . $newName;
        }

        $updateData = [
            'name'        => $name,
            'slug'        => $slug,
            'description' => trim($this->request->getPost('description')),
            'image'       => $imagePath,
            'status'      => $this->request->getPost('status') ? 1 : 0,
        ];

        $categoryModel->update($id, $updateData);

        return redirect()->to(base_url('admin/categories'))->with('success', 'Category "' . esc($name) . '" updated successfully!');
    }

    public function delete(int $id)
    {
        $categoryModel = new CategoryModel();
        $category      = $categoryModel->find($id);

        if ($category) {
            $categoryModel->delete($id);
            return redirect()->to(base_url('admin/categories'))->with('success', 'Category deleted successfully!');
        }

        return redirect()->to(base_url('admin/categories'))->with('error', 'Category not found.');
    }
}
