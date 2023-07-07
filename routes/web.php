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

Route::prefix('/blog')->name('blog.')->group(function () {
    Route::get('/', function () {
        return 'Page blog. Lien d\'un article : <a href="' . \route('blog.show', ['slug' => 'article', 'id' => 8]) . '">Article 8</a>' ;
    })->name('index');

    Route::get('/{slug}-{id}', function (string $slug, int $id) {
        return 'Article ' . $id . ' : ' . $slug;
    })->where([
        'id' => '[0-9]+',
        'slug' => '[a-z0-9\-]+'
    ])->name('show');
});
