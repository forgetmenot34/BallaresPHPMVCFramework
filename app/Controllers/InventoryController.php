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
        if (
            !Validator::required(
                $request->input('product_name')
            )
        ) {
            die('Product name required');
        }

        $this->products->create(
            $request->all()
        );

        (new Response())->redirect('/inventory');
    }

    public function edit(int $id)
    {
        Engine::render(
            'inventory/edit',
            [
                'product' => $this->products->find($id)
            ]
        );
    }

    public function update(
        int $id,
        Request $request
    )
    {
        $this->products->update(
            $id,
            $request->all()
        );

        (new Response())->redirect('/inventory');
    }

    public function delete(int $id)
    {
        $this->products->delete($id);

        (new Response())->redirect('/inventory');
    }
}