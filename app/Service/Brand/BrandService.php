<?php
namespace App\Service\Brand;

use App\Repositories\Brand\BrandRepositoryInterface;
use App\Service\BaseService;

class BrandService extends BaseService implements BrandServiceInterface
{
    public $repository;

    public function __construct(BrandRepositoryInterface $BrandRepository)
    {
        $this->repository = $BrandRepository;
    }
}