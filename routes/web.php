<?php

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
//route::view('/','home');
route::get('/','HomeController@index')->name('home');

//route::view('/booklist','book.booklist');
route::get('/booklist','BookController@index')->name('booklist');
route::get('/book/{id}','BookController@show')->name('book');

//cart
route::get('/cart','CartController@index')->name('cart');
route::post('/cart','CartController@store')->name('cart.store');
route::get('/empty',function(){
    Cart::destroy();
});

route::view('/profile','customer.profile');

