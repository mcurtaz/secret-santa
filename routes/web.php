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
Route::get('/help', function(){
    return view('help');
}) -> name('help');

Auth::routes();

Route::get('/home', 'HomeController@index') -> name('home');
Route::post('/setsanta', 'HomeController@setSanta') -> name('set-santa');
Route::get('/WS', 'HomeController@myWS') -> name('myWS');
Route::get('/createwish/{id}/{wish}', 'HomeController@createWish') -> name('create-wish');
Route::post('/storewish', 'HomeController@storeWish') -> name('store-wish');
Route::post('/delete', 'HomeController@deleteWish') -> name('delete-wish');
Route::post('/santadone', 'HomeController@santaDone') -> name('santa-done');
Route::get('/explore', 'HomeController@explore') -> name('explore');
