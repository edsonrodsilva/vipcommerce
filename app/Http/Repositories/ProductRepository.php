<?php

namespace App\Repositories;

use Illuminate\Http\Request;
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
            return $this->success('All products', $products);
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

            return $this->success("Product retrieve", $product);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function createProduct(Request $request)
    {
        try {
            $product = new Product();
            $product->code = $request->code;
            $product->name = $request->name;
            $product->color = $request->color;
            $product->size = $request->size;
            $product->price = $request->price;
            $product->save();

            return $this->success("Product created", $product, 200);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function updateProduct(Request $request, $id)
    {
        try {
            $product = Product::find($id);

            //Check the product
            if (!$product) return $this->error("No product with ID $id", 204);

            $product->code = $request->code;
            $product->name = $request->name;
            $product->color = $request->color;
            $product->size = $request->size;
            $product->price = $request->price;
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
