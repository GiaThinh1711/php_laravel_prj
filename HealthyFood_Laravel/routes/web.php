<?php
use App\Http\Controllers\WebController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\InformationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[WebController::class,"home"] );
Route::get('/about',[WebController::class,"aboutus"] );
//category
Route::get('/category',[CategoryController::class,"all"] );
Route::get('/category/new',[CategoryController::class,"form"] );
Route::post('/category/save',[CategoryController::class,"save_category"] );
Route::get('/category/edit/{id}',[CategoryController::class,"edit"] );
Route::post('/category/update/{id}',[CategoryController::class,"update"] );
//campaign
Route::get('/campaign',[CampaignController::class,"all"] );
Route::get('/campaign/new',[CampaignController::class,"create"] );
Route::post('/campaign/save',[CampaignController::class,"save"] );
Route::get('/campaign/edit/{id}',[CampaignController::class,"edit"] );
Route::post('/campaign/update/{id}',[CampaignController::class,"update"] );
//information
Route::get('/information',[InformationController::class,"all"] );
Route::get('/information/new',[InformationController::class,"create"] );
Route::post('/information/save',[InformationController::class,"save"] );
Route::get('/information/edit/{id}',[InformationController::class,"edit"] );
Route::post('/information/update/{id}',[InformationController::class,"update"] );
