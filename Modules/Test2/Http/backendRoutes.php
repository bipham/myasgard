<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/test2'], function (Router $router) {
    $router->bind('entity_test1', function ($id) {
        return app('Modules\Test2\Repositories\Entity_test1Repository')->find($id);
    });
    $router->get('entity_test1s', [
        'as' => 'admin.test2.entity_test1.index',
        'uses' => 'Entity_test1Controller@index',
        'middleware' => 'can:test2.entity_test1s.index'
    ]);
    $router->get('entity_test1s/create', [
        'as' => 'admin.test2.entity_test1.create',
        'uses' => 'Entity_test1Controller@create',
        'middleware' => 'can:test2.entity_test1s.create'
    ]);
    $router->post('entity_test1s', [
        'as' => 'admin.test2.entity_test1.store',
        'uses' => 'Entity_test1Controller@store',
        'middleware' => 'can:test2.entity_test1s.create'
    ]);
    $router->get('entity_test1s/{entity_test1}/edit', [
        'as' => 'admin.test2.entity_test1.edit',
        'uses' => 'Entity_test1Controller@edit',
        'middleware' => 'can:test2.entity_test1s.edit'
    ]);
    $router->put('entity_test1s/{entity_test1}', [
        'as' => 'admin.test2.entity_test1.update',
        'uses' => 'Entity_test1Controller@update',
        'middleware' => 'can:test2.entity_test1s.edit'
    ]);
    $router->delete('entity_test1s/{entity_test1}', [
        'as' => 'admin.test2.entity_test1.destroy',
        'uses' => 'Entity_test1Controller@destroy',
        'middleware' => 'can:test2.entity_test1s.destroy'
    ]);
    $router->bind('entity_test2', function ($id) {
        return app('Modules\Test2\Repositories\Entity_test2Repository')->find($id);
    });
    $router->get('entity_test2s', [
        'as' => 'admin.test2.entity_test2.index',
        'uses' => 'Entity_test2Controller@index',
        'middleware' => 'can:test2.entity_test2s.index'
    ]);
    $router->get('entity_test2s/create', [
        'as' => 'admin.test2.entity_test2.create',
        'uses' => 'Entity_test2Controller@create',
        'middleware' => 'can:test2.entity_test2s.create'
    ]);
    $router->post('entity_test2s', [
        'as' => 'admin.test2.entity_test2.store',
        'uses' => 'Entity_test2Controller@store',
        'middleware' => 'can:test2.entity_test2s.create'
    ]);
    $router->get('entity_test2s/{entity_test2}/edit', [
        'as' => 'admin.test2.entity_test2.edit',
        'uses' => 'Entity_test2Controller@edit',
        'middleware' => 'can:test2.entity_test2s.edit'
    ]);
    $router->put('entity_test2s/{entity_test2}', [
        'as' => 'admin.test2.entity_test2.update',
        'uses' => 'Entity_test2Controller@update',
        'middleware' => 'can:test2.entity_test2s.edit'
    ]);
    $router->delete('entity_test2s/{entity_test2}', [
        'as' => 'admin.test2.entity_test2.destroy',
        'uses' => 'Entity_test2Controller@destroy',
        'middleware' => 'can:test2.entity_test2s.destroy'
    ]);
// append


});
