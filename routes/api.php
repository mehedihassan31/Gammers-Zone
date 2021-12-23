<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\gamesubscribeController;
use App\Http\Controllers\api\InformationController;
use App\Http\Controllers\api\matchesController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\ProductsController;
use App\Http\Controllers\api\SliderController;
use App\Http\Controllers\api\transectionController;
use App\Models\transection;
use App\Models\withdraw;
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


   Route::post('/logout',[AuthController::class,"logout"]);

//  slider--------------------  
   Route::get('/sliderdata',[SliderController::class,"getSliderData"]);


// product-----------------
   Route::get('/products/',[ProductsController::class,'getAllProducts']);



// match----------------------------
   // Route::get('/matches',[matchesController::class,'getAllMatches']);

Route::get('/matches',[gamesubscribeController::class,'getAllMatcheswithroomid']);
  


// transection-------------------------------
   Route::get('/transections',[transectionController::class,'getAllTransections']);
   Route::get('/withdrawshistory',[transectionController::class,'getSingleWithdrawHistory']);
   Route::post('/deposit',[transectionController::class,'makeDeposit']);

   // withdraw-------------------------

   Route::post('/withdraw',[transectionController::class,'withdrawReq']);
  


   // user---------------------------------------

   Route::get('/getuser/{id}',[AuthController::class,'getUserData']);
   Route::post('/updateUser',[AuthController::class,'userDataUpdata']);
   Route::post('/updatePasskey',[AuthController::class,'userPassUpdata']);

   Route::get('/allmatchbyuser',[gamesubscribeController::class,'getallmatchbyuser']);

   // match

Route::post('/joinmatch',[gamesubscribeController::class,'joinMatch']);
   
Route::get('/ongoingmatch',[gamesubscribeController::class,'getongoingmatch']);
Route::get('/AllCloseMatch',[gamesubscribeController::class,'getAllCloseMatch']);
Route::get('/getalluserbymatch/{matchid}',[gamesubscribeController::class,'getalluserbymatch']);



// order--------------------------------------------

Route::post('/orderplace',[OrderController::class,'makeOrder']);

Route::get('/orderlist/{id}',[OrderController::class,'getAllOrders']);


Route::get('/results/{id}',[gamesubscribeController::class,"getResults"]);



   
    
});

// Route::get('/sliderdata',[SliderController::class,"getSliderData"]);
Route::post('/register',[AuthController::class,"register"]);
Route::post('/login',[AuthController::class,"login"]);

Route::get('/information',[InformationController::class,"getInformationData"]);



