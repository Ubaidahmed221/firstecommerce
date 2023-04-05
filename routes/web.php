<?php

use App\Http\Controllers\CostomerCotroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboards', function () {
    return view('welcome');
  })->middleware(['login','role']);
Route::get('/dashboards/productcat',[ProductCategoryController::class,'index'])->middleware(['login','role']);
Route::get('/dashboards/productcat/insart',[ProductCategoryController::class,'insart'])->middleware(['login','role']);
Route::post('/dashboards/productcat/store',[ProductCategoryController::class,'store'])->middleware(['login','role']);
Route::get('/dashboards/productcat/edit/{id}',[ProductCategoryController::class,'edit'])->middleware(['login','role']);
Route::post('/dashboards/productcat/update/{id}',[ProductCategoryController::class,'update'])->middleware(['login','role']);
Route::get('/dashboards/productcat/delet/{id}',[ProductCategoryController::class,'delet'])->middleware(['login','role']);

Route::get('/dashboards/product',[ProductController::class,'index'])->middleware(['login','role']);
Route::get('/dashboards/product/insart',[ProductController::class,'insart'])->middleware(['login','role']);
Route::post('/dashboards/product/store',[ProductController::class,'store'])->middleware(['login','role']);
Route::get('/dashboards/product/edit/{id}',[ProductController::class,'edit'])->middleware(['login','role']);
Route::post('/dashboards/product/update/{id}',[ProductController::class,'update'])->middleware(['login','role']);
Route::get('/dashboards/product/delet/{id}',[ProductController::class,'delet'])->middleware(['login','role']);
Route::get('/dashboards/product/trash',[ProductController::class,'trash'])->middleware(['login','role']);
Route::get('/dashboards/product/restore/{id}',[ProductController::class,'restore'])->middleware(['login','role']);
Route::get('/dashboards/product/forcedelect/{id}',[ProductController::class,'forcedelect'])->middleware(['login','role']);


Route::get('/dashboards/costomer',[CostomerCotroller::class,'index'])->middleware(['login','role']);
Route::get('/dashboards/costomer/insart',[CostomerCotroller::class,'insart'])->middleware(['login','role']);
Route::post('/dashboards/costomer/store',[CostomerCotroller::class,'store'])->middleware(['login','role']);
Route::get('/dashboards/costomer/edit/{id}',[CostomerCotroller::class,'edit'])->middleware(['login','role']);
Route::post('/dashboards/costomer/update/{id}',[CostomerCotroller::class,'update'])->middleware(['login','role']);
Route::get('/dashboards/costomer/delet/{id}',[CostomerCotroller::class,'delet'])->middleware(['login','role']);

Route::get('/getsession',function(){

  // session()->flush();
  print_r(session()->all());

});
Route::get('/removecart',function($id){
  if(isset($cart[$id])){
    
  }
});


Route::get('/costomer/register',[HomeController::class,'register']);
Route::post('/costomer/register/store',[HomeController::class,'registerstore']);
Route::get('/customers/login',[HomeController::class,'login']);
Route::get('/customers/loginout',[HomeController::class,'loginout']);

Route::get('/admin/login',[HomeController::class,'adminlogin']);
Route::post('/admin/login/store',[HomeController::class,'adminloginstore']);
Route::get('/admin/loginout',[HomeController::class,'adminloginout']);

Route::post('/customers/login/store',[HomeController::class,'loginstore']);

Route::get('/',[HomeController::class,'index']);
Route::get('/details/{id}',[HomeController::class,'details']);
Route::get('/addtocart/{product}',[HomeController::class,'addtocart']);
Route::get('/allcart',[HomeController::class,'allcart']);



Route::get('/contact',[HomeController::class,'contact'])->middleware('login');




?>