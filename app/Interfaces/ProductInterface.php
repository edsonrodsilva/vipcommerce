<?php

namespace App\Interfaces;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;

interface ProductInterface
{
    /**
     * Get all clients
     * @method  GET api/clients
     * @access  public
     */
    public function getAllProducts();

    /**
     * Get Product By ID
     * @param   integer     $id
     * @method  GET api/clients/{id}
     * @access  public
     */
    public function getProductById($id);

    /**
     * Create | client
     * @param   \App\Http\Requests\ProductCreateRequest  $request
     * @method  POST  api/clients For Create
     * @access  public
     */
    public function createProduct(ProductCreateRequest $request);

    /**
     * Update client
     *
     * @param   \App\Http\Requests\ProductUpdateRequest  $request
     * @param   integer   $id
     * @method  PUT  api/clients/{id} For Update
     * @access  public
     */
    public function updateProduct(ProductUpdateRequest $request, $id);

    /**
     * Delete client
     * @param   integer     $id
     * @method  DELETE  api/clients/{id}
     * @access  public
     */
    public function deleteProduct($id);
}
