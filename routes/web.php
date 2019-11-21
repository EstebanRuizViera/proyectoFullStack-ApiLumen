<?php

use App\Airport;

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
    return $router->app->version();
});

$router->get('/airports', function () use ($router) {
    $airports=Airport::all();

    foreach($airports as $airport){
        echo "Nombre: ".$airport->name."<br>";
    }
});

$router->group(['prefix' => 'api'], function () use ($router) {

    // Matches "/api/register
   $router->post('register', 'AuthController@register');
   // Matches "/api/login
  $router->post('login', 'AuthController@login');

    //TABLA AIRPORT

    $router->get('airports',  ['uses' => 'AirportController@showAllAirport']);
  
    $router->get('airport/{id}', ['uses' => 'AirportController@showOneAirport']);
  
    $router->post('airport', ['uses' => 'AirportController@create']);
  
    $router->delete('airport/{id}', ['uses' => 'AirportController@delete']);
  
    $router->put('airport/{id}', ['uses' => 'AirportController@update']);

    //TABLA FLIGHT

    $router->get('flights',  ['uses' => 'FlightController@showAllFlight']);
  
    $router->get('flight/{id}', ['uses' => 'FlightController@showOneFlight']);
  
    $router->post('flight', ['uses' => 'FlightController@create']);
  
    $router->delete('flight/{id}', ['uses' => 'FlightController@delete']);
  
    $router->put('flight/{id}', ['uses' => 'FlightController@update']);

    //TABLA PLANE

    $router->get('planes',  ['uses' => 'PlaneController@showAllPlane']);
  
    $router->get('plane/{id}', ['uses' => 'PlaneController@showOnePlane']);
  
    $router->post('plane', ['uses' => 'PlaneController@create']);
  
    $router->delete('plane/{id}', ['uses' => 'PlaneController@delete']);
  
    $router->put('plane/{id}', ['uses' => 'PlaneController@update']);

    //TABLA USER

    $router->get('users',  ['uses' => 'UserController@showAllUser']);
  
    $router->get('user/{id}', ['uses' => 'UserController@showOneUser']);
  
    $router->post('user', ['uses' => 'UserController@create']);
  
    $router->delete('user/{id}', ['uses' => 'UserController@delete']);
  
    $router->put('user/{id}', ['uses' => 'UserController@update']);
});

