<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function __construct(protected ProductService $service)
    {}


    public function index(Request $request) {
        return "asdadssa";
    }

    public function store(ProductRequest $request) {

        $data = $request->all();
        try {
            $product = $this->service->new($data);
            return response()->json(["message" => "product created successfully", "data" => $product], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['msg' =>  $e->getMessage()], 422);
        }
    }

    public function show($id): JsonResponse
    {
        $product = $this->service->findOne($id);
        if (!$product) {
            return response()->json(["error" => "product not found"], Response::HTTP_NOT_FOUND);
        }

        return response()->json(["data" => $product], Response::HTTP_OK);
    }

    public function update(ProductRequest $request, $id): JsonResponse
    {
        $product = $this->service->updateProduct($request, $id);
        return response()->json(["message" => "product updated successfully", "data" => $product], Response::HTTP_OK);
    }

    public function destroy($id): JsonResponse
    {
        $product = $this->service->findOne($id);

        if (!$product) {
            return response()->json(["error" => "Task not found"], Response::HTTP_NOT_FOUND);
        }

        $this->service->destroy($id);

        return response()->json(["message" => "product deleted successfully"], Response::HTTP_OK);
    }

}
