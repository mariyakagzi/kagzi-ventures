<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'name',
        'slug',
        'category_id',
        'sku',
        'price',
        'sale_price',
        'stock_quantity',
        'short_description',
        'features',
        'specifications',
        'description',
        'main_image',
        'images',
        'featured',
        'is_trending',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;

    public function getProductsPaginated(?string $categorySlug = null, ?string $searchQuery = null, string $sort = 'default', int $perPage = 12)
    {
        $builder = $this->select('products.*, categories.name as category_name, categories.slug as category_slug')
                        ->join('categories', 'categories.id = products.category_id', 'left')
                        ->where('products.status', 1);

        if (!empty($categorySlug)) {
            $builder->where('categories.slug', $categorySlug);
        }

        if (!empty($searchQuery)) {
            $builder->groupStart()
                    ->like('products.name', $searchQuery)
                    ->orLike('products.description', $searchQuery)
                    ->orLike('products.short_description', $searchQuery)
                    ->orLike('products.sku', $searchQuery)
                    ->groupEnd();
        }

        switch ($sort) {
            case 'price_low':
                $builder->orderBy('products.price', 'ASC');
                break;
            case 'price_high':
                $builder->orderBy('products.price', 'DESC');
                break;
            case 'name':
                $builder->orderBy('products.name', 'ASC');
                break;
            case 'date':
            case 'newest':
                $builder->orderBy('products.id', 'DESC');
                break;
            default:
                $builder->orderBy('products.featured', 'DESC')->orderBy('products.id', 'DESC');
                break;
        }

        return [
            'products' => $builder->paginate($perPage),
            'pager'    => $this->pager,
        ];
    }

    public function getProductBySlug(string $slug)
    {
        return $this->select('products.*, categories.name as category_name, categories.slug as category_slug')
                    ->join('categories', 'categories.id = products.category_id', 'left')
                    ->where('products.slug', $slug)
                    ->where('products.status', 1)
                    ->first();
    }

    public function getRelatedProducts(int $categoryId, int $excludeId, int $limit = 4)
    {
        return $this->select('products.*, categories.name as category_name, categories.slug as category_slug')
                    ->join('categories', 'categories.id = products.category_id', 'left')
                    ->where('products.category_id', $categoryId)
                    ->where('products.id !=', $excludeId)
                    ->where('products.status', 1)
                    ->orderBy('products.id', 'DESC')
                    ->findAll($limit);
    }

    public function getFeaturedProducts(int $limit = 8)
    {
        return $this->select('products.*, categories.name as category_name, categories.slug as category_slug')
                    ->join('categories', 'categories.id = products.category_id', 'left')
                    ->where('products.status', 1)
                    ->where('products.featured', 1)
                    ->orderBy('products.id', 'DESC')
                    ->findAll($limit);
    }

    public function getTrendingProducts(int $limit = 8)
    {
        return $this->select('products.*, categories.name as category_name, categories.slug as category_slug')
                    ->join('categories', 'categories.id = products.category_id', 'left')
                    ->where('products.status', 1)
                    ->where('products.is_trending', 1)
                    ->orderBy('products.id', 'DESC')
                    ->findAll($limit);
    }

    public function getLatestProducts(int $limit = 8)
    {
        return $this->select('products.*, categories.name as category_name, categories.slug as category_slug')
                    ->join('categories', 'categories.id = products.category_id', 'left')
                    ->where('products.status', 1)
                    ->orderBy('products.id', 'DESC')
                    ->findAll($limit);
    }
}
