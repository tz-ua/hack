<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\WorkplaceController;
use App\Http\Controllers\API\LeaveRequestController;
use App\Http\Controllers\TestController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')
    ->group(static function (): void {
        Route::get('', [UserController::class, 'index'])->name('index');
        Route::post('', [UserController::class, 'store'])->name('store');
        Route::patch('{user}', [UserController::class, 'update'])->name('update');
        Route::delete('{user}', [UserController::class, 'destroy'])->name('destroy');
    });

Route::group([
    'prefix' => 'leave_requests'
], static function () {
    Route::get('', [LeaveRequestController::class, 'list'])->name('list');
    Route::post('', [LeaveRequestController::class, 'create'])->name('create');
});

Route::prefix('workplaces')
    ->group(static function (): void {
        Route::get('', [WorkplaceController::class, 'index'])->name('index');
        Route::post('', [WorkplaceController::class, 'create'])->name('store');
        Route::get('{workplace}', [WorkplaceController::class, 'show'])->name('show');
    });

Route::post('/test', [TestController::class, 'testPost'])
    ->name('testPost');

Route::get('/test', [TestController::class, 'testGet'])
    ->name('testGet');
