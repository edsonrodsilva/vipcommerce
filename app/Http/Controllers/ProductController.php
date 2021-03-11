<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Interfaces\ProductInterface;

class ProductController extends Controller
{
    protected $produtctInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(ProductInterface $produtctInterface)
    {
        $this->produtctInterface = $produtctInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->produtctInterface->getAllProducts();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $produtctCreateRequest)
    {
        return $this->produtctInterface->createProduct($produtctCreateRequest);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->produtctInterface->getProductById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $produtctUpdateRequest, $id)
    {
        return $this->produtctInterface->updateProduct($produtctUpdateRequest, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->produtctInterface->deleteProduct($id);
    }
}
