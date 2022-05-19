<?php

require_once __DIR__ .'/vendor/autoload.php';

use app\controllers\ProductController;
use app\core\Application;
$app = new Application();

$app->router->get('/' , [ProductController::class, 'home']);
$app->router->delete('/' , [ProductController::class, 'deleteProduct']);
$app->router->post('/id' , [ProductController::class, 'checkUnique']);
$app->router->get('/addproduct', [ProductController::class, 'addProduct']);
$app->router->post('/addproduct', [ProductController::class, 'saveProduct']);

$app->run();