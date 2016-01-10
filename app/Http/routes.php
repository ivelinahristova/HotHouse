<?php
use Illuminate\Routing\Router;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hi', function () {

    return 'hi';
});

Route::resource('sensors', 'SensorsController');

Route::group(['middleware' => 'cors'], function(Router $router){
    $router->get('sensors/{sensorName}', 'SensorsController@update');
});

Route::group(['middleware' => 'cors'], function(Router $router){
    $router->get('sensors', 'SensorsController@index');
});

Route::resource('controls', 'ControlsController');

Route::group(['middleware' => 'cors'], function(Router $router){
    $router->get('controls/{controlName}', 'ControlsController@update');
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
