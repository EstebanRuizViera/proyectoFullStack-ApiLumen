<?php

use App\Airport;
use App\Flight;
use App\User;

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

$router->get('/create_reservations/{id_user}/{id_vuelo}', function ($id_user,$id_vuelo) use ($router) {
    $user = User::find($id_user);
    $user->flights()->attach($id_vuelo,['departure_date'=>'2019-01-01','arrival_date'=>'2019-01-02']);
    echo json_encode("guardado");
});

$router->get('/select_reservations/{id_user}', function ($id_user) use ($router) {
    $user = User::find($id_user);
    $array = array();
    $number=0;
    foreach($user->flights as $flight){
        $array[$number]=array('origen'=>$flight->airport->city,'destino'=>$flight->flight_destination,'fecha de salida'=>$flight->pivot->departure_date,'fecha de llegada'=>$flight->pivot->arrival_date);
        $number++;
    }
    echo json_encode($array);
});

$router->get('/select_flight/{id}', function ($id) use ($router) {
    $airport = Airport::find($id);
    $array = array();
    $number=0;
    foreach($airport->flight as $flight){
        $array[$number]=array('destino'=>$flight->flight_destination,'id_vuelo'=>$flight->id);
        $number++;
    }
    
    echo json_encode($array);
});

$router->get('/delete_reservations/{id_user}', function ($id_user) use ($router) {
    $user = User::find($id_user);
    $user->flights()->detach();
});

$router->get('/airports', function () use ($router) {
    $airports=Airport::all();

    foreach($airports as $airport){
        echo "Nombre: ".$airport->name."<br>";
    }
});

$router->group (['prefix' => 'api/auth'], function () use ($router) {

    $router->post('register', 'AuthController@register');

    $router->post('login', 'AuthController@login');

    $router->get('airport/{name}', ['uses' => 'AirportController@selectAirportForName']);

    $router->post('user', ['uses' => 'UserController@showOneUserWithEmail']);
    
});


$router->group(['prefix' => 'api','middleware' => 'auth'], function () use ($router) {
    
    //TABLA AIRPORT
  
    $router->get('airport/{id}', ['uses' => 'AirportController@showOneAirport']);
  
    $router->post('airport', ['uses' => 'AirportController@create']);
  
    $router->delete('airport/{id}', ['uses' => 'AirportController@delete']);
  
    $router->put('airport/{id}', ['uses' => 'AirportController@update']);

    //TABLA FLIGHT

    
  
    $router->get('flight/{id}', ['uses' => 'FlightController@showOneFlight']);
  
    $router->post('flight', ['uses' => 'FlightController@create']);
  
    $router->delete('flight/{id}', ['uses' => 'FlightController@delete']);
  
    $router->put('flight/{id}', ['uses' => 'FlightController@update']);

    //TABLA USER

  
    $router->get('user/{id}', ['uses' => 'UserController@showOneUser']);
  
    $router->post('user', ['uses' => 'UserController@create']);
  
    $router->delete('user/{id}', ['uses' => 'UserController@delete']);
  
    $router->put('user/{id}', ['uses' => 'UserController@update']);
});

$router->group(['prefix' => 'api/all'], function () use ($router) {

    $router->get('airports',  ['uses' => 'AirportController@showAllAirport']);

    $router->get('flights',  ['uses' => 'FlightController@showAllFlight']);

    $router->get('planes',  ['uses' => 'PlaneController@showAllPlane']);

    $router->get('users',  ['uses' => 'UserController@showAllUser']);
});