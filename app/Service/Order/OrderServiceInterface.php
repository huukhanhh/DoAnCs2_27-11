<?php

namespace App\Service\Order;

use App\Service\ServiceInterface;

interface OrderServiceInterface extends ServiceInterface
{

    public function getOrderByUserId($userId);
    
}