<?php

namespace App\Controllers;

use Core\View\Engine;
use Core\Http\Request;
use Core\Http\Response;
use Core\Validation\Validator;
use Core\Contracts\ProductRepositoryInterface;

class InventoryController
{
    private ProductRepositoryInterface $products;   

    public function __construct(
        ProductRepositoryInterface $products
    )
    {
        $this->products = $products;
    }

    public function index()
    {
        Engine::render(
            'inventory/index',
            [
                'products' => $this->products->all()
            ]
        );
    }

    public function create()
    {
        Engine::render('inventory/create');
    }

   public function store(Request $request)
{
    $productName =
        $request->input('product_name');

    $sku =
        $request->input('sku');

    $category =
        $request->input('category');

    $quantity =
        $request->input('quantity');

    /*
    Product Name Validation
    */

    if (!Validator::required($productName)) {

        (new Response())->alert(
            'Product name is required'
        );
    }

    if (!Validator::min($productName, 3)) {

        (new Response())->alert(
            'Product name must be at least 3 characters'
        );
    }

    if (!Validator::max($productName, 50)) {

        (new Response())->alert(
            'Product name must not exceed 50 characters'
        );
    }

    /*
    SKU Validation
    */

    if (!Validator::required($sku)) {

        (new Response())->alert(
            'SKU is required'
        );
    }

    if (!Validator::min($sku, 2)) {

        (new Response())->alert(
            'SKU must be at least 2 characters'
        );
    }

    if (!Validator::max($sku, 20)) {

        (new Response())->alert(
            'SKU must not exceed 20 characters'
        );
    }

    /*
    Category Validation
    */

    if (!Validator::required($category)) {

        (new Response())->alert(
            'Category is required'
        );
    }

    if (!Validator::min($category, 3)) {

        (new Response())->alert(
            'Category must be at least 3 characters'
        );
    }

    /*
    Quantity Validation
    */

    if (!Validator::required($quantity)) {

        (new Response())->alert(
            'Quantity is required'
        );
    }

    if (!Validator::numeric($quantity)) {

        (new Response())->alert(
            'Quantity must be numeric'
        );
    }

    if ((int)$quantity <= 0) {

        (new Response())->alert(
            'Quantity must be greater than 0'
        );
    }

    
    //CREATE PRODUCT
    $this->products->create([
        'product_name' => $productName,
        'sku' => $sku,
        'category' => $category,
        'quantity' => $quantity
    ]);

    (new Response())->redirect(
        '/inventory'
    );
}

    public function edit(int $id)
    {
        Engine::render(
            'inventory/edit',
            [
                'product' =>
                    $this->products->find($id)
            ]
        );
    }

    public function delete(int $id)
    {
        $this->products->delete($id);
            (new Response())->redirect(
            '/inventory'
        );
    }

    public function update(
    int $id,
    Request $request
)
{
    $productName =
        $request->input('product_name');

    $sku =
        $request->input('sku');

    $category =
        $request->input('category');

    $quantity =
        $request->input('quantity');

  
    //PRODUCT NAME VALIDATOR
    if (!Validator::required($productName)) {

        (new Response())->alert(
            'Product name is required'
        );
    }

    if (!Validator::min($productName, 3)) {

        (new Response())->alert(
            'Product name must be at least 3 characters'
        );
    }

    if (!Validator::max($productName, 50)) {

        (new Response())->alert(
            'Product name must not exceed 50 characters'
        );
    }

 
    //SKU VALIDATOR
    if (!Validator::required($sku)) {

        (new Response())->alert(
            'SKU is required'
        );
    }

    
    //CATEGORY VALIDATOR
    if (!Validator::required($category)) {

        (new Response())->alert(
            'Category is required'
        );
    }

    // QUANTITY VALIDATION
    if (!Validator::required($quantity)) {

        (new Response())->alert(
            'Quantity is required'
        );
    }

    if (!Validator::numeric($quantity)) {

        (new Response())->alert(
            'Quantity must be numeric'
        );
    }

    if ((int)$quantity <= 0) {

        (new Response())->alert(
            'Quantity must be greater than 0'
        );
    }

    
    //UPDATE PRODUCT

    $this->products->update(
        $id,
        [
            'product_name' => $productName,
            'sku' => $sku,
            'category' => $category,
            'quantity' => $quantity
        ]
    );

    (new Response())->redirect(
        '/inventory'
    );
}
}