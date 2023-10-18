<?php

namespace App\Repository;

use App\Models\Amount;
use App\Repository\Others\AbstractRepository;


class AmountRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Amount();
    }

    public function createAmount($productId, $quantity) {
        return $this->model->create([
            'product_id' => $productId,
            'amount' => $quantity,
        ]);
    }

    public function deleteByProductId($productId) {
        return $this->model->where('product_id', $productId)->delete();
    }

}
