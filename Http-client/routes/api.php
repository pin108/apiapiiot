<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PertanianController;
use App\Http\Controllers\PertanianHttpclient;
use App\Http\Controllers\pertanianscontroller;
use GuzzleHttp\Middleware;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\httpnew;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Public Routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{$id}', [ProductController::class, 'show']);
Route::post('/register', [AuthController::class, 'register']);
Route::resource('pertanians', pertanianscontroller::class);
Route::get('/tani', [ProductController::class, 'index']);
Route::get('/tani/{$id}', [ProductController::class, 'show']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/nafnaf', [httpnew::class, 'store']);
Route::get('/nafnaf', [httpnew::class, 'index']);
Route::post('/pertanians', [pertanianscontroller::class, 'store']);
// Private Routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/products', [ProductController::class, 'store']);

    Route::put('/products/{$id}', [ProductController::class, 'store']);
    Route::delete('/products/{$id}', [ProductController::class, 'destroy']);
    Route::post('/tani', [PertanianHttpclient::class, 'store']);
    
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/posts', [ClientController::class,'getAllPost'])->name('posts.getallpost');

Route::get('/posts/{id}',[ClientController::class, 'getPostById'])->name('posts.getPostById');
Route::post('/postdata',[ClientController::class, 'Postadd'])->name('posts.addpost');
Route::get('/updatepost/{id}',[ClientController::class, 'UpdatePost'])->name('posts.updatepost');
Route::get('/deletepost/{id}',[ClientController::class, 'DeletePost'])->name('posts.deletepost');
Route::post('/image/{string}',[ClientController::class, 'image'])->name('posts.image');

// Route::resource('products', ProductController::class);