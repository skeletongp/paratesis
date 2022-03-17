<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\DB;
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
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::controller(AuthController::class)->group(function () {
    Route::get('auth/access', 'access')->name('auth.access');
    Route::post('auth/login', 'login')->name('auth.login');
    Route::post('auth/logout', 'logout')->name('auth.logout');
    Route::get('auth/createPassword', 'createPassword')->name('auth.createPassword');
    Route::post('auth/register', 'register')->name('auth.register');
    Route::get('auth/redirect', 'redirect')->name('auth.redirect');
    Route::get('auth/callback', 'callback');
});

Route::controller(AreaController::class)->middleware('auth')->group(function () {
    Route::get('areas', 'index')->name('areas.index');
});
Route::controller(UniversityController::class)->middleware('auth')->group(function () {
    Route::get('universities', 'index')->name('universities.index');
});
Route::controller(CityController::class)->middleware('auth')->group(function () {
    Route::get('cities', 'index')->name('cities.index');
});


Route::controller(WorkController::class)->middleware('auth')->group(function () {
    Route::get('works', 'index')->name('works.index');
    Route::get('works/{work}', 'show')->name('works.show');
});

Route::get('/uuid', function () {
    $areas = file_get_contents("js/areas.json");
    $areas = json_decode($areas, true)['data'];
    
    return $areas;
});
