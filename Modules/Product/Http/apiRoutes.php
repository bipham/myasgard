<?php

use Illuminate\Routing\Router;
/** @var Router $router */
$router->group(['prefix' => '/product'], function (Router $router) {

    $router->group(['prefix' => 'products'], function (Router $router) {
        $router->get('/', [
            'as' => 'api.product.product.index',
            'uses' => 'ProductController@index',
        ]);
    });

});
