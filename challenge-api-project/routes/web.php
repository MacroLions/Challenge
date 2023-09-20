<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return "Hello Api!";
});

$router->get('/card/ping', 'CardController@ping');
$router->get('/card/checkDate/{month}/{year}', 'CardController@checkDate');
$router->get('/card/checkCard/{pan}', 'CardController@checkCard');
$router->get('/card/checkCVV/{pan}/{cvv}', 'CardController@checkCVV');
