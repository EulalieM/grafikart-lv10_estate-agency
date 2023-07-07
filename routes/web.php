<?php

use Illuminate\Http\Request;
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

Route::get('/blog', function () {
    return 'Page blog';
});

Route::get('/blog/{slug}-{id}', function (string $slug, int $id) {
    return 'Article ' . $id . ' : ' . $slug;
})->where([
    'id' => '[0-9]+',
    'slug' => '[a-z0-9\-]+'
]);
