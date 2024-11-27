<?php

namespace App\Repositories\ProductCategory;

use App\Models\ProductCategory;
use App\Repositories\BaseRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Faker\Provider\Base;

class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface

{
    public function getModel()
    {
        return ProductCategory::class;
    }
}