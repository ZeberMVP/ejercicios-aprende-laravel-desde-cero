<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Ejercicio 1

Route::get('/ejercicio1', function () {
    return "GET OK";
});

Route::post('/ejercicio1', function () {
    return "POST OK";
});

Route::put('/ejercicio1', function () {
    return "PUT OK";
});

Route::delete('/ejercicio1', function () {
    return "DELETE OK";
});

Route::patch('/ejercicio1', function () {
    return "PATCH OK";
});

ROUTE::post('/ejercicio2/a', function (Request $request) {
    return Response::json([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
    ], 200);
});

ROUTE::post('/ejercicio2/b', function (Request $request) {

    if ($request->price < 0) {
        return Response::json([
            "message" => "Price can't be less than 0"
        ], 422);
    }

    return Response::json([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
    ], 200);
});

ROUTE::post('/ejercicio2/c/{discount?}', function (Request $request) {

    $discount = 0;
    if ($request->query('discount') == "SAVE5") {
        $discount = 5;
    } else if ($request->query('discount') == "SAVE10") {
        $discount = 10;
    } else if ($request->query('discount') == "SAVE15") {
        $discount = 15;
    }

    return Response::json([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price - ($request->price * $discount / 100),
        'discount' => $discount,
    ], 200);
});
