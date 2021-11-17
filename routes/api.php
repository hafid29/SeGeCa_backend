<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Building\GetBuildings;
use App\Http\Controllers\Building\AddBuilding;
use App\Http\Controllers\Building\AddBuildingDetail;
use App\Http\Controllers\Building\GetBuildingById;
use App\Http\Controllers\Building\AddBuildingType;
use App\Http\Controllers\Building\GetBuildingTypeById;

// Catering Controller
use App\Http\Controllers\Building\GetCatering;
use App\Http\Controllers\Building\AddCatering;
use App\Http\Controllers\Building\AddCateringDetail;
use App\Http\Controllers\Building\GetCateringById;
use App\Http\Controllers\Building\AddCateringType;
use App\Http\Controllers\Building\GetCateringTypeById;

// User Controller
use App\Http\Controllers\Order\GetOrder;
use App\Http\Controllers\Order\AddOrder;
use App\Http\Controllers\Order\GetOrderById;
use App\Http\Controllers\Order\AddOrderStatus;
use App\Http\Controllers\Order\GetOrderStatusById;

// User Controller
use App\Http\Controllers\User\RegisterUser;
use App\Http\Controllers\User\LoginUser;
use App\Http\Controllers\User\AddUserDetail;
use App\Http\Controllers\User\GetUser;

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

// Route for Catering
Route::prefix("catering")->group(function() {
    Route::get("/",[GetCatering::class,"index"]);
    Route::post("/",[AddCatering::class,"createCatering"]);
    Route::get("/{id}",[GetCateringById::class,"getCateringById"]);
    Route::post("/type",[AddCateringType::class,"addCateringType"]);
    Route::post("/detail",[AddCateringDetail::class,"addCateringDetail"]);
    Route::get("/type/{id}",[GetCateringTypeById::class,"getCateringTypeById"]);
});

// Route for Order
Route::prefix("order")->group(function() {
    Route::get("/",[GetOrder::class,"index"]);
    Route::post("/",[AddOrder::class,"createOrder"]);
    Route::get("/{id}",[GetOrderById::class,"getOrderById"]);
    Route::post("/status",[AddOrderStatus::class,"addOrderStatus"]);
    Route::get("/status/{id}",[GetOrderStatusById::class,"getOrderStatusById"]);
});

// Route for user
Route::prefix("user")->group(function() {
    Route::post("/",[RegisterUser::class,"registerUser"]);
    Route::post("/login",[LoginUser::class,"loginUser"]);
    Route::get("/all",[GetUser::class,"getUser"]);
    Route::get("/{id}",[GetUserById::class,"getUserById"]);
    Route::post("/detail",[AddUserDetail::class,"addUserDetail"]);
});

// route for get user role
