<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Paypack\Paypack;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/testPayment', function () {
    $paypack = new Paypack();

    $paypack->config([
        'client_id' => env('PAYPACK_CLIENT_ID'),
        'client_secret' => env('PAYPACK_CLIENT_SECRET'),
    ]);
    // $transaction = $paypack->Transaction('abbab17c-31b8-48c4-89f8-d0832a920431');
    $transaction =  $paypack->Events(['ref' => '21f70e14-247f-470f-aecb-b12bc437f003']);
    return response()->json($transaction);
});
