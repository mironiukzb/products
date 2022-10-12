<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
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


Route::group(['middleware' => 'auth.basic', 'prefix' => '/product'], function () {
    Route::name('product.')->group(function () {
        Route::get('list', [ProductController::class, 'list'])->name('list');
        Route::post('', [ProductController::class, 'store'])->name('store');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('delete');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
    });
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
