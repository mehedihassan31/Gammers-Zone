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
use App\Http\Controllers\admin\Reviewcontroller;
use App\Http\Controllers\admin\transectionController;
use App\Http\Controllers\admin\usersController;
use App\Http\Controllers\admin\VisitorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/





Route::get('/apidoc',function(){
    return view('ApiDoc');

});

Route::get('/',function(){
    return view('welcome');

});






Route::prefix('admin')->group(function () {


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


// gamme (match)-------------------------
Route::get('/games',[GameController::class,'GameIndex']);

Route::get('/getGameData',[GameController::class,'getGamesData']);
Route::post('/gameDelete',[GameController::class,'GameDelete']);

Route::post('/gameAdd',[GameController::class,'GameAdd']);
Route::post('/gameUpdate',[GameController::class,'GameUpdate']);

});






Route::get('/login',[LoginController::class,'loginIndex']);
Route::post('/onlogin',[LoginController::class,'onLogin']);
Route::get('/logout',[LoginController::class,'onlogout']);


















//Adminpanel courses management

Route::get('/courses',[coursesController::class,'CoursesIndex']);

Route::get('/getCoursesData',[coursesController::class,'getCoursesData']);
Route::post('/CourseDelete',[coursesController::class,'CourseDelete']);
Route::post('/CourseDetails',[coursesController::class,'getCoursedetails']);
Route::post('/CourseUpdate',[coursesController::class,'CourseUpdate']);
Route::post('/CourseAdd',[coursesController::class,'CourseAdd']);



// Adminpanel Project
Route::get('/projects',[ProjectsController::class,'ProjectsIndex']);
Route::get('/getprojectsdata',[ProjectsController::class,'getProjectsData']);
Route::post('/projectdelete',[ProjectsController::class,'ProjectDelete']);

Route::post('/ProjectUpdate',[ProjectsController::class,'ProjectUpdate']);
Route::post('/projectAdd',[ProjectsController::class,'ProjectAdd']);

Route::post('/ProjectDetails',[ProjectsController::class,'getProjectdetails']);


// Contact
Route::get('/contact',[ContactController::class,'ContactIndex']);
Route::get('/getcontactdata',[ContactController::class,'getContactData']);
Route::post('/contactdelete',[ContactController::class,'ContactDelete']);










