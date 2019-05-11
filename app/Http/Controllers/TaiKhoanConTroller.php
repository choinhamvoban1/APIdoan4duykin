<?php

namespace App\Http\Controllers;
use App\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // sử dụng DB

class TaiKhoanConTroller extends Controller
{
    public function login(Request $request)
   {
       $taikhoan = $request->input('tk'); // lấy ra từ phía client gửi lên
       $matkhau = $request->input('mk');
       $users = DB::table('taikhoan') // xử lý select trong csdl 
                ->where('TaiKhoan', $taikhoan)
                ->where('MatKhau', $matkhau)->get();
              
      return response()->json($users); // server trả về json 
   }

   public function dangki(Request $request1)
   {

    $blankavatar='https://znews-photo.zadn.vn/w660/Uploaded/yfsgs/2019_04_02/56168060_2541140532581784_8960363091644645376_n.jpg';
       $taikhoan = $request1->input('tk'); // lấy ra từ phía client gửi lên
       $matkhau = $request1->input('mk');
       $diachi = $request1->input('diachi');
       $hoten = $request1->input('hoten');
       $sdt = $request1->input('sdt');

      DB::table('taikhoan')->insert([
    ['TaiKhoan' => $taikhoan,
     'MatKhau' =>  $matkhau,
     'SDT' => $sdt,
     'DiaChi' => $diachi,
     'HoTen' =>  $hoten,
     'HinhAnh'=>$blankavatar]]);

   }

  
 
}
