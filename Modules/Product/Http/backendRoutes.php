<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/product'], function (Router $router) {
// append
    $router->get('products', [
        'as' => 'admin.product.product.index',
        'uses' => 'ProductController@index',
    ]);
});
