<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Building\GetBuildings;
use App\Http\Controllers\Building\AddBuilding;
use App\Http\Controllers\Building\AddBuildingDetail;
use App\Http\Controllers\Building\GetBuildingById;
use App\Http\Controllers\Building\AddBuildingType;
use App\Http\Controllers\Building\GetBuildingTypeById;


// User Controller
use App\Http\Controllers\User\RegisterUser;
use App\Http\Controllers\User\LoginUser;
use App\Http\Controllers\User\AddUserDetail;
use App\Http\Controllers\User\GetUserDetail;

// content controller
use App\Http\Controllers\Content\AddContent;
use App\Http\Controllers\User\GetUserById;

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

// Route for post
Route::prefix("content")->group(function() {
    Route::post("/",[AddContent::class,"index"]);
    // Route::get("/{id}",[GetContentById::class,"getContentByid"]);
    // Route::get("/",[GetContents::class,"getContents"]);
});

// Route for order
Route::prefix("order")->group(function() {});

// Route for building
Route::prefix("building")->group(function() {
    Route::get("/",[GetBuildings::class,"index"]);
    Route::post("/",[AddBuilding::class,"createBuilding"]);
    Route::get("/{id}",[GetBuildingById::class,"getBuildingById"]);
    Route::post("/type",[AddBuildingType::class,"addBuildingType"]);
    Route::post("/detail",[AddBuildingDetail::class,"addBuildingDetail"]);
    Route::get("/type/{id}",[GetBuildingTypeById::class,"getBuildingTypeById"]);
});

// Route for user
Route::prefix("user")->group(function() {
    Route::post("/",[RegisterUser::class,"registerUser"]);
    Route::post("/login",[LoginUser::class,"loginUser"]);
    Route::get("/data",[GetUserById::class,"getUserById"]);
    Route::post("/detail",[AddUserDetail::class,"addUserDetail"]);
});

// route for get user role
