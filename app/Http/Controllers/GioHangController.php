<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GioHangController extends Controller
{
    public function laphoadonban(Request $req)
    {
        $idtk = $req->input('idtk');
        $tongtien = $req->input('tongtien');
        $hoten = $req->input('hoten');
        $ngaylaphd = $req->input('ngaylaphd');
        $dagiaohang = $req->input('dagiaohang');

        DB::table('hoadonban')->insert([
            ['IdTaiKhoan' => $idtk,
                'TongTien' => $tongtien,
                'HoTen' => $hoten,
                'NgayLapHd' => $ngaylaphd,
                'DaGiaoHang' => $dagiaohang],
        ]);

        $users = DB::table('hoadonban')
            ->where('IdTaiKhoan', $idtk)->get();
        //->where('Id', 'DESC')->get();
        return response()->json($users);

    }

    public function ghichitiethoadon(Request $req)
    {
        $tensp=$req->input('tensp');
        $hinhanh=$req->input('hinhanh');
        $idsp = $req->input('idsp');
        $idhoadon = $req->input('idhoadon');
        $soluong = $req->input('soluong');
        $dongia = $req->input('dongia');
        $thanhtien = $req->input('thanhtien');

        DB::table('chitiethoadonban')->insert([
            ['IdSanPham' => $idsp,
                'IdHoaDon' => $idhoadon,
                'SoLuong' => $soluong,
                'DonGia' => $dongia,
                'ThanhTien' => $thanhtien,
                'TenSp' => $tensp,
                'HinhAnh' => $hinhanh],
                ]);
        

    }

    public function updatesoluongsanpham(Request $req)
    {
      
        $idsp = $req->input('idsp');
        $slclient = $req->input('soluong');
        $sldb = DB::table('sanpham')->select('SoLuong')->where('Id', $idsp)->get();
    // e muốn đưa cái $sldb này về thành 1 số int 
        // echo $sldb;
    
        foreach ($sldb as $t) {
            $slupdate= $t->SoLuong-$slclient;
        }
        DB::table('sanpham')
        ->where('Id', $idsp)
        ->update(['Soluong' => $slupdate]);

        

    }
}
