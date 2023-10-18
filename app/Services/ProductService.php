<?php

namespace App\Services;

use App\Repository\ProductRepository;
use App\Repository\AmountRepository;

class ProductService {
    public function __construct(protected ProductRepository $productRepository, protected AmountRepository $amountRepository)
    {}

    public function findAll() {
        return $this->productRepository->findAll();
    }

    public function findOne($id) {
        return $this->productRepository->findOne($id);
    }

    public function new($data) {
        if ($data) {
            // Crie o produto
            $product = $this->productRepository->new($data);
            // Certifique-se de que 'quantity' esteja presente nos dados
            if (isset($data['quantity'])) {
                // Recupere o ID do produto após a criação
                $product = $this->productRepository->new($data);
                $productID = $product->id;

                // Use o amountRepository para criar o registro de quantidade
                return $this->amountRepository->createAmount($productID, $data['quantity']);

            }

            return true;
        }
    }

    public function updateProduct($request, $id) {
        $product = $this->productRepository->findOne($id);

        if (!$product) {
            throw new \Exception('Produto não encontrado');
        }

        $requestAttributes = $request->all();

        // Atualize os dados do produto
        $this->productRepository->update($id, $requestAttributes);

        if (isset($requestAttributes['quantity'])) {
            // Atualize a quantidade diretamente no modelo Product
            $product->quantity = $requestAttributes['quantity'];
            $product->save();
        }
    }

    public function destroy($id) {
        if($id) {
            $product = $this->productRepository->findOne($id);
            if ($product) {
                // Obtenha o product_id do produto
                $productID = $product->id;

                // Exclua registros correspondentes em amount com base no product_id
                $this->amountRepository->deleteByProductId($productID);

                // Exclua o registro do produto
                $this->productRepository->delete($id);

                return redirect()->back();
            }
        }

        return redirect()->back();
    }
}





