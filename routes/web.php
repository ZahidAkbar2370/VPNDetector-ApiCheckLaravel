<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin', function () {
    return view('Admin.admin_layout');
});

Route::get("/", [HomeController::class, "check"]);

Route::get("/admin/settings", [SettingController::class, "setting"]);
Route::post("/admin/save-setting", [SettingController::class, "store"]);


Route::get("/admin/create-country", [CountryController::class, "create"]);
Route::post("/admin/save-country", [CountryController::class, "store"]);
Route::get("/admin/countries", [CountryController::class, "index"]);

Route::get("/admin/approved-country/{id}", [CountryController::class, "approve"]);
Route::get("/admin/blocked-country/{id}", [CountryController::class, "blocked"]);
Route::get("/admin/delete-country/{id}", [CountryController::class, "destroy"]);