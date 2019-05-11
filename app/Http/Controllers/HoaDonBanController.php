<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HoaDonBanController extends Controller
{
    public function loadhoadondagiaohang(Request $request){
        $idtk = $request->input('idtk');
        $spdagiao = DB::table('hoadonban') 
        ->where('IdTaiKhoan', $idtk)
        ->where('DaGiaoHang', 1)->get();
        return response()->json($spdagiao);
       }
       
       public function loadhoadondanggiaohang(Request $req){
        $idtk = $req->input('idtk');
        $spdanggiao = DB::table('hoadonban') 
        ->where('IdTaiKhoan', $idtk)
        ->where('DaGiaoHang', 0)->get();
        return response()->json($spdanggiao);
       }

       public function loadchitiethoadondanggiao(Request $request){
        $idhoadon = $request->input('idhoadon');
        $chitietdanggiao = DB::table('chitiethoadonban') 
        ->where('IdHoaDon', $idhoadon)->get();
        return response()->json($chitietdanggiao);
       }

       public function loadchitiethoadondagiao(Request $request){ // đã giao hàng 
        $idhoadon = $request->input('idhoadon');
        $chitietdagiao = DB::table('chitiethoadonban') 
        ->where('IdHoaDon', $idhoadon)->get();
        return response()->json($chitietdagiao);
       }

}
