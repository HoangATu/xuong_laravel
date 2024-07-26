<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\CheckAminMiddleware;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\Admins\ChucVuController;
use App\Http\Controllers\Admins\DanhMucController;
use App\Http\Controllers\Admins\SanPhamController;
use App\Http\Controllers\Admins\BinhLuanController;
use App\Http\Controllers\Admins\TaiKhoanController;
use App\Http\Controllers\Clients\TrangChuController;
use App\Http\Controllers\Admins\PhuongThucController;

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

Route::get('/home', function () {
    return 'Đây là trang chủ';
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

// Route::get('/khach_hang_list', [KhachHangController::class, 'list']);
// Route::get('/khach_hang_create', [KhachHangController::class, 'create']);
// Route::get('/khach_hang_update', [KhachHangController::class, 'update']);
// Route::get('/home', [HomeController::class, 'index']);
// Route::get('/admin', [HomeController::class, 'admin']);


Route::get('/login', [AuthController::class, 'showFormLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showFormRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ROUTE RESORUCE
// Route::get('/sanpham/test', [SanPhamController::class, 'test'])->name('sanpham.test');
Route::resource('/sanpham', SanPhamController::class)->middleware(['auth', 'auth.admin']);

// Route::get('/danhmuc/test', [DanhMucController::class, 'test'])->name('danhmuc.test');
Route::resource('/danhmuc', DanhMucController::class);

// Route::get('/binhluan/test', [BinhLuanController::class, 'test'])->name('binhluan.test');
Route::resource('/binhluan', BinhLuanController::class);

// Route::get('/chucvu/test', [ChucVuController::class, 'test'])->name('chucvu.test');
Route::resource('/chucvu', ChucVuController::class);

// Route::get('/taikhoan/test', [TaiKhoanController::class, 'test'])->name('taikhoan.test');
Route::resource('/taikhoan', TaiKhoanController::class);

// Route::get('/phuongthuc/test', [PhuongThucController::class, 'test'])->name('phuongthuc.test');
Route::resource('/phuongthuc', PhuongThucController::class);


Route::get('/index/wishlist', [TrangChuController::class, 'wishlist'])->name('index.wishlist');
Route::get('/index/detail', [TrangChuController::class, 'detail'])->name('index.detail');
Route::get('/index/shop', [TrangChuController::class, 'shop'])->name('index.shop');
Route::get('/index/cart', [TrangChuController::class, 'cart'])->name('index.cart');
Route::get('/index/pay', [TrangChuController::class, 'pay'])->name('index.pay');
Route::get('/index/account', [TrangChuController::class, 'account'])->name('index.account');
Route::get('/index/login', [TrangChuController::class, 'login'])->name('index.login');
Route::resource('/index', TrangChuController::class);
