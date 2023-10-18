<?php


namespace App\Repository;

use App\Models\Product;
use App\Repository\Others\AbstractRepository;


class ProductRepository extends AbstractRepository {
    public function __construct()
    {
        $this->model = new Product();
    }

}
