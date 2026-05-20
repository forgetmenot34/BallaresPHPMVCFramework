<?php

use App\Controllers\InventoryController;

$router->get('/', [InventoryController::class, 'index']);

$router->get('/inventory', [InventoryController::class, 'index']);

$router->get('/inventory/create', [InventoryController::class, 'create']);

$router->post('/inventory/store', [InventoryController::class, 'store']);

$router->get('/inventory/edit/{id}', [InventoryController::class, 'edit']);

$router->post('/inventory/update/{id}', [InventoryController::class, 'update']);

$router->get('/inventory/delete/{id}', [InventoryController::class, 'delete']);