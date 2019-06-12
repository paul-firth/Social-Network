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

use App\Product;
use App\Manufacturer;
use App\User;

Route::resource('product', 'ProductController');

Route::get('/test', function () {
    //$user = User::find(1);
    //$prods = $user->products;
    //dd($prods);
    
//    $user = User::find(1);
//    $name = 'iPhone';
//    $prods = $user->products()->whereRaw('name like ?',
//                    array("%$name%"))->get();
//     dd($prods);

    $name = 'Apple';
    $products = Product::whereHas('manufacturer', function($query)use($name){
        return $query->whereRaw('name like ?', array("%name%"));
    })->get();
    dd($products);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
