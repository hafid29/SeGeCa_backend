<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Building\GetBuildings;
use App\Http\Controllers\Building\AddBuilding;
use App\Http\Controllers\Building\GetBuildingById;
use App\Http\Controllers\Building\AddBuildingType;
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
});