<?php

use App\Http\Controllers\Api\CountryController;
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

Route::get('/v1/countries', [CountryController::class, 'getCountries'])->name('country-getCountries');
Route::get('/v1/countries/{country}', [CountryController::class, 'getCountryById'])->name('country-getCountryById');
Route::post('/v1/countries', [CountryController::class, 'createCountry'])->name('country-createCountry');
Route::patch('/v1/countries/{country}', [CountryController::class, 'updateCountry'])->name('country-updateCountry');
Route::delete('/v1/countries/{country}', [CountryController::class, 'deleteCountry'])->name('country-deleteCountry');
