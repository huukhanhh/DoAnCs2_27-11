<?php
namespace App\Service\ProductComment;

use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Service\BaseService;

class ProductCommentService extends BaseService implements ProductCommentServiceInterface
{
    public $repository;

    public function __construct(ProductCommentRepositoryInterface $ProductCommentRepository)
    {
        $this->repository = $ProductCommentRepository;
    }
}