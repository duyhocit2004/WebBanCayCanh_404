<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admins\DanhMucController;
use App\Http\Controllers\Admins\SanPhamController;
use App\Http\Controllers\clients\CartClientsController;
use App\Http\Controllers\clients\HomeClientsController;
use App\Http\Controllers\clients\DetailProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeClientsController::class,'index'])->name('/');

Route::get('sanpham/detail/{id}',[DetailProductController::class,'deltail'])->name('product-tetail');
Route::get('list-cart-user',[CartClientsController::class,'ListCartUser'])->name('list-cart');
Route::post('user-add-cart',[CartClientsController::class,'UserAddCart'])->name('add-cart');
Route::post('user-edit-cart',[CartClientsController::class,'UserEditCart'])->name('edit-cart');


// Route::
// Route resouce
// Route::middleware('auth','auth.admin')->prefix('danhsach')->as('admins')->group(function(){
   
//     Route::prefix('sanpham')->as('sanpham')->group(function(){
    
//     });
// });
Route::resource('danhmuc', DanhMucController::class)->middleware('auth.admin');
Route::resource('sanpham', SanPhamController::class)->middleware('auth.admin');

// Route::get('/',[SanphamController::class,'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');