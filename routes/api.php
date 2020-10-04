<?php

use App\Http\Controllers\API\CreateSale;
use App\Http\Controllers\API\GetSales;
use App\Http\Controllers\API\GetSellers;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/sellers', GetSellers::class)
    ->name('seller.all');

Route::get('/sales/{sellerId}', GetSales::class)
    ->name('seller.sales');

Route::post('/sale/create', CreateSale::class)
    ->name('sale.create');
