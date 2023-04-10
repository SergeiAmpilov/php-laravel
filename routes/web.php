<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Test\TestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/query', [TestController::class, 'query']);
Route::get('/main', [HomeController::class, 'main']);
Route::get('/maintest', [HomeController::class, 'test']);
Route::get('test2', [TestController::class, 'index']);



Route::prefix('pages')->group(function() {
    Route::get('about', [PageController::class, 'show']);
    Route::get('{slug}', [PageController::class, 'slug']);
});

Route::resource('posts', PostController::class, [
    'parameters' => [
        'posts' => 'slug'
    ]
]);


/* Routes - lesson 1 */

Route::get('/hw', function() {
    return "<h1>Hello world</h1>";
})->name('hw');

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
