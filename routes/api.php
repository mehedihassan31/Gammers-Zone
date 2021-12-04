<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\matchesController;
use App\Http\Controllers\api\ProductsController;
use App\Http\Controllers\api\SliderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     // return Route::get('/sliderdata',[SliderController::class,"getSliderData"]);
    
// });
Route::group(['middleware' => ['auth:sanctum']], function () {
   Route::get('/sliderdata',[SliderController::class,"getSliderData"]);
   Route::post('/logout',[AuthController::class,"logout"]);
   Route::get('/products',[ProductsController::class,'getAllProducts']);
   Route::get('/matches',[matchesController::class,'getAllMatches']);
    
});

// Route::get('/sliderdata',[SliderController::class,"getSliderData"]);
Route::post('/register',[AuthController::class,"register"]);

Route::post('/login',[AuthController::class,"login"]);
