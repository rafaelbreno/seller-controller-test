<?php

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

Route::get('/sellers', function () {
    return response()->json(
        \App\Models\User::all()->toArray()
        , 200);
});

Route::get('/sales/{sellerId}', function ($sellerId) {
    return response()->json(
        \App\Models\Sale::where('seller_id', $sellerId)
            ->orderBy('created_at')
            ->get()
            ->toArray()
        ,200);
})->name('seller.sales');

Route::post('/addsale', function (Request $request) {

})->name('sale.create');
