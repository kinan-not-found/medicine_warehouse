<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderMedicineController;
use App\Http\Controllers\PharmacistController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::prefix('/country')->controller(CountryController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'create');
    Route::delete('/{id}', 'delete');
});
Route::prefix('/city')->controller(CityController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'create');
    Route::delete('/{id}', 'delete');
});
Route::prefix('/company')->controller(CompanyController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'create');
    Route::delete('/{id}', 'delete');
});
Route::prefix('/user')->controller(UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::delete('/{id}', 'delete');
});
Route::prefix('/language')->controller(LanguageController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'create');
    Route::delete('/{id}', 'delete');
});
Route::prefix('/provider')->controller(ProviderController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'create');
});
Route::prefix('/pharmacist')->controller(PharmacistController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'create');
});
Route::prefix('/category')->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'create');
    Route::delete('/{id}', 'delete');
});
Route::prefix('/medicine')->controller(MedicineController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'create');
    Route::delete('/{id}', 'delete');
});
Route::prefix('/order')->controller(OrderController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'create');
    Route::delete('/{id}', 'delete');
});
Route::prefix('/order_medicine')->controller(OrderMedicineController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'create');
    Route::delete('/{id}', 'delete');
});
