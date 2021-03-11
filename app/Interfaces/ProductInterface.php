<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ProductInterface
{
    /**
     * Get all products
     * @method  GET api/products
     * @access  public
     */
    public function getAllProducts();

    /**
     * Get Product By ID
     * @param   integer     $id
     * @method  GET api/products/{id}
     * @access  public
     */
    public function getProductById($id);

    /**
     * Create | product
     * @param   \Illuminate\Http\Request  $request
     * @method  POST  api/products For Create
     * @access  public
     */
    public function createProduct(Request $request);

    /**
     * Update product
     *
     * @param   \Illuminate\Http\Request  $request
     * @param   integer   $id
     * @method  PUT  api/products/{id} For Update
     * @access  public
     */
    public function updateProduct(Request $request, $id);

    /**
     * Delete product
     * @param   integer     $id
     * @method  DELETE  api/products/{id}
     * @access  public
     */
    public function deleteProduct($id);
}
