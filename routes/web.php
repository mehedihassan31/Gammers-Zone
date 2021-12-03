<?php

use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\coursesController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\ProjectsController;
use App\Http\Controllers\admin\Reviewcontroller;
use App\Http\Controllers\admin\VisitorController;
use App\Http\Controllers\admin\ServicesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/





Route::get('/apidoc',function(){
    return view('ApiDoc');

});

Route::get('/login',[LoginController::class,'loginIndex']);
Route::post('/onlogin',[LoginController::class,'onLogin']);
Route::get('/logout',[LoginController::class,'onlogout']);





Route::get('/',[HomeController::class,'HomeIndex']);
Route::get('/visitor',[VisitorController::class,'VisitorIndex']);

//service admin

Route::get('/services',[ServicesController::class,'ServicesIndex']);
Route::get('/getServicesData',[ServicesController::class,'getServicesData']);
Route::post('/ServicesDelete',[ServicesController::class,'ServiceDelete']);
Route::post('/ServicesDetails',[ServicesController::class,'getdetails']);
Route::post('/ServicesUpdate',[ServicesController::class,'serviceUpdate']);
Route::post('/ServicesAdd',[ServicesController::class,'serviceAdd']);

//Slider admin

Route::get('/slider',[SliderController::class,'SliderIndex']);
Route::get('/getSliderData',[SliderController::class,'getSliderData']);
Route::post('/SliderDelete',[SliderController::class,'SliderDelete']);
Route::post('/SliderDetails',[SliderController::class,'getdetails']);
Route::post('/SliderUpdate',[SliderController::class,'SliderUpdate']);
Route::post('/SliderAdd',[SliderController::class,'sliderAdd']);



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


// review
Route::get('/reviews',[Reviewcontroller::class,'reviewsIndex']);
Route::get('/getreviewsdata',[Reviewcontroller::class,'getreviewsData']);
Route::post('/reviewdelete',[Reviewcontroller::class,'reviewDelete']);

Route::post('/ReviewUpdate',[Reviewcontroller::class,'reviewUpdate']);
Route::post('/reviewAdd',[Reviewcontroller::class,'reviewAdd']);
Route::post('/ReviewDetails',[Reviewcontroller::class,'getreviewdetails']);




Route::get('/slider',[SliderController::class,'sliderIndex']);

Route::post('/sliderupload',[SliderController::class,'sliderUpload']);
Route::get('/sliderall',[SliderController::class,'sliderJson']);
Route::get('/sliderjsonbyid/{id}',[SliderController::class,'sliderJsonById']);
Route::post('/sliderdelete',[SliderController::class,'sliderDelete']);







