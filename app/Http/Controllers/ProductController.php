<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(Request $request) {
        return "asdadssa";
    }

    public function store(ProductRequest $request) {
        dd($request);
    }
}
