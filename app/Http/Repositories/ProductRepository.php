<?php

namespace App\Repositories;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Interfaces\ProductInterface;
use App\Models\Product;
use App\Traits\ResponseApiTrait;
use Exception;

class ProductRepository implements ProductInterface
{
    //Use ResponseApiTrait Trai in this repository
    use ResponseApiTrait;

    public function getAllProducts()
    {
        try {
            $products = Product::paginate(10);
            return $this->success('All Products', $products);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getProductById($id)
    {
        try {
            $product = Product::find($id);

            //Check the product
            if (!$product) return $this->error("No product with ID $id", 204);

            return $this->success("Product detail", $product);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function createProduct(ProductCreateRequest $productCreateRequest)
    {
        try {
            $product = new Product();
            $product->name = $productCreateRequest->namecomplete;
            $product->save();

            return $this->success("Product created", $product, 200);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function updateProduct(ProductUpdateRequest $productUpdateRequest, $id)
    {
        try {
            $product = Product::find($id);

            //Check the product
            if (!$product) return $this->error("No product with ID $id", 204);

            $product->namecompleto = $productUpdateRequest->namecompleto;
            $product->save();

            return $this->success("Product updated", $product, 201);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function deleteProduct($id)
    {
        try {
            $product = Product::find($id);

            // Check the user
            if (!$product) return $this->error("No product with ID $id", 204);

            $product->delete();

            return $this->success('Product deleted', $product);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
