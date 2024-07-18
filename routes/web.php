<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\Admins\ChucVuController;
use App\Http\Controllers\Admins\DanhMucController;
use App\Http\Controllers\Admins\SanPhamController;
use App\Http\Controllers\Admins\BinhLuanController;
use App\Http\Controllers\Admins\TaiKhoanController;

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

Route::get('/', function () {
    return view('welcome');
});


// Tạo route để trỏ đến view

// //C2
// Route::view('/hello', 'xinchao');

//TRUYỀN DỮ LIỆU SANG VIEW
//C1

// Route::get('/hello', function () {
//     $title = "Thầy định xấu trai";
//     $text = "Xấu trai nhất xóm";
//     return view('xinchao', ['title'=>$title, 'text'=>$text]);
// });

//C2

// Route::view('/hello', 'xinchao', [
//     'title' => 'Hihi xin chào',
//     'text' => 'abcxyz'
// ]);


// TẠO MỘT ROUTE ĐỂ TRỎ ĐẾN HÀM TRONG CONTROLLER

Route::get('/khach_hang_list', [KhachHangController::class, 'list']);
Route::get('/khach_hang_create', [KhachHangController::class, 'create']);
Route::get('/khach_hang_update', [KhachHangController::class, 'update']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/admin', [HomeController::class, 'admin']);

// ROUTE RESORUCE
Route::get('/sanpham/test', [SanPhamController::class, 'test'])->name('sanpham.test');
Route::resource('/sanpham', SanPhamController::class);

Route::get('/danhmuc/test', [DanhMucController::class, 'test'])->name('danhmuc.test');
Route::resource('/danhmuc', DanhMucController::class);

Route::get('/binhluan/test', [BinhLuanController::class, 'test'])->name('binhluan.test');
Route::resource('/binhluan', BinhLuanController::class);

Route::get('/chucvu/test', [ChucVuController::class, 'test'])->name('chucvu.test');
Route::resource('/chucvu', ChucVuController::class);

Route::get('/taikhoan/test', [TaiKhoanController::class, 'test'])->name('taikhoan.test');
Route::resource('/taikhoan', TaiKhoanController::class);
