<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// tài khoản
Route::post('login', 'TaiKhoanConTroller@login')->name('login');
Route::post('dangki', 'TaiKhoanConTroller@dangki')->name('dangki');

// sản phẩm
Route::get('loadsptrangchu', 'SanPhamController@loadsptrangchu')->name('loadsptrangchu');
Route::get('loadspnu', 'SanPhamController@loadspnu')->name('loadspnu');
Route::get('loadspnam', 'SanPhamController@loadspnam')->name('loadspnam');
//  bán hàng
Route::post('laphoadonban', 'GioHangController@laphoadonban')->name('laphoadonban');
Route::post('ghichitiethoadon', 'GioHangController@ghichitiethoadon')->name('ghichitiethoadon');
Route::post('updatesoluongsanpham', 'GioHangController@updatesoluongsanpham')->name('updatesoluongsanpham');
// lịch sử mua hàng
Route::post('loadhoadondagiaohang', 'HoaDonBanController@loadhoadondagiaohang')->name('loadhoadondagiaohang');
Route::post('loadhoadondanggiaohang', 'HoaDonBanController@loadhoadondanggiaohang')->name('loadhoadondanggiaohang');

Route::post('loadchitiethoadondanggiao', 'HoaDonBanController@loadchitiethoadondanggiao')->name('loadchitiethoadondanggiao');
