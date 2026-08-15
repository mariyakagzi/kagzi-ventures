<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'name',
        'slug',
        'description',
        'image',
        'parent_id',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;

    public function getActiveCategories()
    {
        return $this->where('status', 1)->orderBy('name', 'ASC')->findAll();
    }
}
