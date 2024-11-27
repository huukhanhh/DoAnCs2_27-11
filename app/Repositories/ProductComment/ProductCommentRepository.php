<?php

namespace App\Repositories\ProductComment;

use App\Models\ProductComment;
use App\Repositories\BaseRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Faker\Provider\Base;

class ProductCommentRepository extends BaseRepository implements ProductCommentRepositoryInterface

{
    public function getModel()
    {
        return ProductComment::class;
    }
}