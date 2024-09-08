<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/ban-an/{id}', [App\Http\Controllers\welcomeController::class, 'welcome'])->name('welcome');
Route::post('/add/info/{id}', [App\Http\Controllers\welcomeController::class, 'add'])->name('add.info');
route::middleware('check.table.existence')->group(function () {
    Route::get('/mon-an/{id}', [App\Http\Controllers\OrderClientController::class, 'show'])->name('OrderClient.show');
    Route::get('/gio-hang/danh-sach-mon', [App\Http\Controllers\CartController::class, 'show'])->name('cart.show'); 
    Route::get('/gio-hang/them-mon/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::get('/gio-hang/danh-sach-mon', [App\Http\Controllers\CartController::class, 'show'])->name('cart.show');
    Route::get('/gio-hang/xoa-mon/{id}', [App\Http\Controllers\CartController::class, 'cartdelete'])->name('cart.delete');
    Route::get('/gio-hang/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::get('/gio-hang/addsql', [App\Http\Controllers\CartController::class, 'addSql'])->name('cart.addsql'); 
    Route::get('/gio-hang/danh-sach-mon-da-goi', [App\Http\Controllers\CartController::class, 'order'])->name('cart.order');
    Route::get('/gio-hang/cap-nhat-mon-an/{id}', [App\Http\Controllers\CartController::class, 'edit'])->name('cart.edit');
    Route::post('/gio-hang/cap-nhat-mon-an/sql/{id}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    // gọi nfv
    Route::get('/goi-nhan-vien/{id}', [App\Http\Controllers\OrderClientController::class, 'call'])->name('OrderClient.call');
    Route::get('/goi-thanh-toan/{id}', [App\Http\Controllers\OrderClientController::class, 'pay'])->name('OrderClient.pay');

});
Route::get('/tim-kiem/mon-an', [App\Http\Controllers\OrderClientController::class, 'search'])->name('search');
Auth::routes();

// admin

// banf admin

// cart
// Route::get('/gio-hang/them-mon/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
// Route::get('/gio-hang/danh-sach-mon', [App\Http\Controllers\CartController::class, 'show'])->name('cart.show');
// Route::get('/gio-hang/xoa-mon/{id}', [App\Http\Controllers\CartController::class, 'cartdelete'])->name('cart.delete');
// Route::get('/gio-hang/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');



// bàn



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
route::middleware('auth')->group(function () {
    //    phần users
   
    Route::get('/quan-ly/ban-an', [App\Http\Controllers\TableController::class, 'show'])->name('test.show');
    Route::get('/test/cap-nhat-mon-an/ajax', [App\Http\Controllers\TableController::class, 'ajax'])->name('ajax');
    Route::get('/quan-ly/ban-an/{id}', [App\Http\Controllers\TableController::class, 'detail'])->name('table.detail');
    Route::get('/quan-ly/ban-an/chon-mon/{id}/{soban}', [App\Http\Controllers\TableController::class, 'add_dish'])->name('table.AddDish');
    Route::post('/quan-ly/ban-an/chon-mon/them-mon/{id}/{soban}', [App\Http\Controllers\TableController::class, 'create_dish'])->name('table.CreateDish');
    Route::get('/quan-ly/ban-an/xac-nhan/{id}', [App\Http\Controllers\TableController::class, 'confirm'])->name('table.confirm');
    Route::get('/quan-ly/ban-an/thanh-toan/{id}', [App\Http\Controllers\TableController::class, 'bill'])->name('table.bill');
    Route::get('/quan-ly/ban-an/lưu-hoa-dơn/{id}/{number}', [App\Http\Controllers\TableController::class, 'savebill'])->name('table.savebill');
    Route::get('/quan-ly/danh-sach-khach-hang', [App\Http\Controllers\TableController::class, 'list_bill'])->name('table.list_bill');//danh sách bill
    Route::get('/quan-ly/chi-tiet-don-hang/{id}', [App\Http\Controllers\TableController::class, 'detail_bill'])->name('table.detail_bill');
    // nhân viên
    Route::get('/quan-ly/nhan-vien', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
    Route::post('/quan-ly/nhan-vien/add', [App\Http\Controllers\UserController::class, 'add'])->name('user.add');
    Route::get('/quan-ly/nhan-vien/chi-tiet/{id}', [App\Http\Controllers\UserController::class, 'detail'])->name('user.detail');
    Route::get('/quan-ly/nhan-vien/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::post('/quan-ly/nhan-vien/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get('/quan-ly/nhan-vien/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
    Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');



    Route::get('/admin/quan-ly-ban', [App\Http\Controllers\TableAdminController::class, 'show'])->name('TableAdmin.show');
Route::post('/add/ban-an', [App\Http\Controllers\TableAdminController::class, 'add'])->name('TableAdmin.add');




Route::get('/quan-ly-danh-muc/mon-an', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
Route::post('/add/danh-muc/mon-an', [App\Http\Controllers\CategoryController::class, 'add'])->name('category.add');
Route::get('/quan-ly-danh-muc/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::post('/update/danh-muc/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::get('/danh-muc/thay-doi-trang-thai/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
// món ăn
Route::get('/quan-ly/mon-an', [App\Http\Controllers\DishController::class, 'show'])->name('dish.show');
Route::post('/them/mon-an', [App\Http\Controllers\DishController::class, 'add'])->name('dish.add');

Route::get('/mon-an/edit/{id}', [App\Http\Controllers\DishController::class, 'edit'])->name('dish.edit');
Route::post('/update/mon-an/{id}', [App\Http\Controllers\DishController::class, 'update'])->name('dish.update');
Route::get('/mon-an/xoa-mon-an/{id}', [App\Http\Controllers\DishController::class, 'delete'])->name('dish.delete');
Route::get('/mon-an/thay-doi-trang-thai/{id}', [App\Http\Controllers\DishController::class, 'status'])->name('dish.status');

Route::get('/doanh-thu/', [App\Http\Controllers\HomeController::class, 'total'])->name('home.total');
});


