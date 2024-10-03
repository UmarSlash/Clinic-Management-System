<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\TestController;

Route::apiResource('/test', TestController::class)->names([
    'index' => 'test.index',
    'store' => 'test.store',
    'show' => 'test.show',
    'update' => 'test.update',
    'destroy' => 'test.destroy',
]);
