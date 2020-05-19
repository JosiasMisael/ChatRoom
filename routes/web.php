<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

Route::resource('chatrooms', 'ChatRoomController',['parameters'=>['chatrooms'=>'chatRoom']]);

Route::get('role-push', 'HomeController@role')->middleware('can:asigna-rol');

});




//Podemos especificar un array sobre las variables que deseamos utilizar para parametros
//Debido a que cuando ejecutamos resource, ejecuta todo el controllador ChatController
