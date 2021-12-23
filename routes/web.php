<?php

use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\coursesController;
use App\Http\Controllers\admin\GameController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\ProjectsController;
use App\Http\Controllers\admin\transectionController;
use App\Http\Controllers\admin\usersController;
use App\Http\Controllers\admin\GamesubscribeController;
use App\Http\Controllers\admin\InformationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/',function(){
    return view('welcome');

});



Route::prefix('admin')->middleware(['loginCheck'])->group(function () {


    // Adminpanel Information
Route::get('/information',[InformationController::class,'InformationIndex']);
Route::get('/getinformationdata',[InformationController::class,'getInformationData']);
Route::post('/informationUpdate',[InformationController::class,'InformationUpdate']);
Route::post('/informationDetails',[InformationController::class,'getInformationdetails']);



//Product admin-----------------
Route::get('/',[HomeController::class,'HomeIndex']);
Route::get('/products',[ProductsController::class,'ProductsIndex']);
Route::get('/getProductsData',[ProductsController::class,'getProductsData']);
Route::post('/ProductsDelete',[ProductsController::class,'productDelete']);
Route::post('/ProductsDetails',[ProductsController::class,'getProductDetails']);
Route::post('/ProductsUpdate',[ProductsController::class,'productUpdate']);
Route::post('/ProductsAdd',[ProductsController::class,'productAdd']);

//Slider admin--------------------

Route::get('/slider',[SliderController::class,'SliderIndex']);
Route::get('/getSliderData',[SliderController::class,'getSliderData']);
Route::post('/SliderDelete',[SliderController::class,'SliderDelete']);
Route::post('/SliderDetails',[SliderController::class,'getdetails']);
Route::post('/SliderUpdate',[SliderController::class,'SliderUpdate']);
Route::post('/SliderAdd',[SliderController::class,'sliderAdd']);


// Order manage--------------------

Route::get('/order',[OrderController::class,'OrderIndex']);
Route::get('/getAllOrder',[OrderController::class,'getOrderData']);
Route::post('/StatusUpdate',[OrderController::class,'sUpdate']);

// Users------------------
Route::get('/users',[usersController::class,'UsersIndex']);
Route::get('/getUsersData',[usersController::class,'getUsersData']);
Route::post('/UsersDelete',[usersController::class,'userDelete']);
Route::post('/UsersDetails',[usersController::class,'getUserDetails']);
Route::post('/balanceAdd',[usersController::class,'balanceAdd']);
Route::post('/winBalanceAdd',[usersController::class,'winBalanceAdd']);


// Transection--------------

Route::get('/transections',[transectionController::class,'transectionsIndex']);
Route::get('/getTransectionData',[transectionController::class,'getTransectionData']);
Route::post('/StatusConfirm',[transectionController::class,'StatusConfirm']);
Route::post('/TransectionDelete',[transectionController::class,'TransectionDelete']);

// Transection--------------

Route::get('/withdraw',[transectionController::class,'withdrawIndex']);
Route::get('/getwithdrawData',[transectionController::class,'getWithdrawData']);
Route::post('/withdrawStatusConfirm',[transectionController::class,'withdrawStatusConfirm']);
Route::post('/WithdrawDelete',[transectionController::class,'WithdrawDelete']);


Route::post('/StatusConfirm',[transectionController::class,'StatusConfirm']);
Route::post('/TransectionDelete',[transectionController::class,'TransectionDelete']);





// gamme (match)-------------------------
Route::get('/games',[GameController::class,'GameIndex']);

Route::get('/getGameData',[GameController::class,'getGamesData']);
Route::post('/gameDelete',[GameController::class,'GameDelete']);
Route::post('/gameAdd',[GameController::class,'GameAdd']);
Route::post('/gameUpdate',[GameController::class,'GameUpdate']);
Route::post('/gameStatusConfirm',[GameController::class,'gameStatusConfirm']);

// results
Route::get('/results/{id}',[GamesubscribeController::class,'ResultIndex']);
Route::post('/getAllsubsData',[GamesubscribeController::class,'getAllsubsData']);
Route::post('/pricemoneyAdd',[GamesubscribeController::class,'pricemoneyAdd']);
Route::post('/killAdd',[GamesubscribeController::class,'killAdd']);
Route::post('/ResultDelete',[GamesubscribeController::class,'ResultDelete']);



Route::post('/UsersDelete',[usersController::class,'userDelete']);
Route::post('/UsersDetails',[usersController::class,'getUserDetails']);

// Admin password update
// Route::get('/adpassdupdate',[LoginController::class,'IndexPass']);
// Route::post('/adpassdupdatereq',[LoginController::class,'updatePass']);

    
});



Route::get('/login',[LoginController::class,'loginIndex']);
Route::post('/onlogin',[LoginController::class,'onLogin']);
Route::get('/logout',[LoginController::class,'onlogout']);















