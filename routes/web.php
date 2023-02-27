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
})->name('hw');

Route::get('/main', function() {
    $data1 = 'data 1';
    $data2 = 'data 2';

    return view('main', compact('data1', 'data2'))->with('var1', $data1 . $data2);
});

Route::get('about', function() {
    return "<h2>about</h2>";
});

/* Routes - lesson 2 */

Route::match(['get', 'post', 'delete'], 'contact', function() {

    if (!empty($_POST)) {
        dump($_POST);
    }

    return view('contact');
})->name('contact2');

Route::view('test', 'test', ['test' => 'Hello World']);

Route::redirect('about', 'contact', 301);

/* Routes - lesson 3 */

/*
Route::get('post/{id}/{slug}', function($var, $slug) {
    return "post with id $var -- $slug";
})->where(['id' => '[0-9]+'], ['slug' => '[a-zA-Z0-9-_]+']);
*/

Route::get('post/{id}/{slug}', function($var, $slug) {
    return "post with id $var -- $slug";
});


Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('posts', function () {
        return 'posts list';
    });

    Route::get('post/create', function () {
        return 'post create';
    });

    Route::get('post/{id}/edit', function ($id) {
        return "post idit | $id";
    })->name('post');
});


// необязательные параметры маршрутов
Route::get('article/{slug?}', function($slug = null) {
    dump($slug);
    return 'articles list page';
})->name('article');

// все остальные маршруты перенаправляем
Route::fallback(function () {
    abort(404, 'Oops! Page not found...');
//    return redirect()->route('hw');
});
