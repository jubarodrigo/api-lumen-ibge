<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return redirect('health');
});
$router->get('health', function () {
    return 'service is up';
});

$router->group(['prefix' => 'address'], function () use ($router) {

    $router->get('/', 'AddressesController@index');
    $router->get('/{id}', 'AddressesController@show');
    $router->post('/', 'AddressesController@create');
    $router->patch('/', 'AddressesController@update');
    $router->delete('/{id}', 'AddressesController@destroy');

});

