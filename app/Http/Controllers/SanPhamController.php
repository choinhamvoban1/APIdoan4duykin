<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
   public function loadsptrangchu(){
    $sanphamtt = DB::table('sanpham')->get();
    return response()->json($sanphamtt);
   }

   public function loadspnu(){
      $sanphamnu = DB::table('sanpham') ->where('Loai', "nu")->get();
      return response()->json($sanphamnu);
     }

     public function loadspnam(){
      $sanphamnam = DB::table('sanpham') ->where('Loai', "nam")->get();
      return response()->json($sanphamnam);
     }
}
