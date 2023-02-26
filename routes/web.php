<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Routes - lesson 1 */

Route::get('/hw', function() {
    return "<h1>Hello world</h1>";
});

Route::get('/main', function() {
    $data1 = 'data 1';
    $data2 = 'data 2';

    return view('main', compact('data1', 'data2'))->with('var1', $data1 . $data2);
});

Route::get('about', function() {
    return "<h2>about</h2>";
});
