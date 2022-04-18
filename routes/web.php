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

$router->get("/json-report", "ExampleController@jsonReport");
$router->get("/html-report", "ExampleController@htmlReport");
$router->get("/csv-report", "ExampleController@csvReport");
$router->get("/chartable", "ExampleController@chartReport");
$router->get("/ds/csv", "GdsController@csv");
$router->get("/ds/json", "GdsController@json");
$router->get("/ds/schema", "GdsController@schema");
