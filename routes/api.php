<?php

use App\Http\Controllers\ReportController;
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

Route::group(['prefix' => 'report'], function () {
    Route::post('/store', [ReportController::class, 'addReport']);
    Route::get('/index', [ReportController::class, 'getAllReports']);
    Route::get('/show', [ReportController::class, 'getReportById']);
    Route::put('/update', [ReportController::class, 'updateReport']);
    Route::delete('/delete', [ReportController::class, 'deleteReport']);
});
