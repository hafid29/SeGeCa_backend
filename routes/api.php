<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Building\GetBuildings;
use App\Http\Controllers\Building\AddBuilding;
use App\Http\Controllers\Building\GetBuildingById;
use App\Http\Controllers\Building\AddBuildingType;
use App\Http\Controllers\Building\GetBuildingTypeById;

// User Controller
use App\Http\Controllers\User\RegisterUser;
use App\Http\Controllers\User\LoginUser;

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

// Route for building
Route::prefix("building")->group(function() {
    Route::get("/",[GetBuildings::class,"index"]);
    Route::post("/",[AddBuilding::class,"createBuilding"]);
    Route::get("/{id}",[GetBuildingById::class,"getBuildingById"]);
    Route::post("/type",[AddBuildingType::class,"addBuildingType"]);
    Route::get("/type/{id}",[GetBuildingTypeById::class,"getBuildingTypeById"]);
});

// Route for user
Route::prefix("user")->group(function() {
    Route::post("/",[RegisterUser::class,"registerUser"]);
    Route::post("/login",[LoginUser::class,"loginUser"]);
    
});

// route for get user role
