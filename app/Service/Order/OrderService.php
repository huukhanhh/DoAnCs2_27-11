<?php
namespace App\Service\Order;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Service\BaseService;

class OrderService extends BaseService implements OrderServiceInterface
{
    public $repository;

    public function __construct(OrderRepositoryInterface $OrderRepository)
    {
        $this->repository = $OrderRepository;
    }

    public function getOrderByUserId($userId)
    {
        return $this->repository->getOrderByUserId($userId);
    }
}