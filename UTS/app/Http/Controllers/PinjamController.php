<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PinjamController extends Controller
{
    //

    public function index(){
      $pinjam=Pinjam::all();
      $data=['pinjam'=>$pinjam];
      return $data;
    }
    public function create(Request $request){
      $pinjam=new Pinjam();
      $pinjam->nama_peminjam=$request->nama_peminjam;
      $pinjam->jumlah_hari=$request->jumlah_hari;
      $pinjam->save();

      return "Data Tersimpan";
    }
    public function update(request $request, $id){
      $pinjam=Pinjam::find($id);
      $pinjam->nama_peminjam=$request->nama_peminjam;
      $pinjam->jumlah_hari=$request->jumlah_hari;
      $pinjam=save();

      return "Data Terupdate";
    }

    public function delete($id){
      $pinjam=Pinjam::find($id);
      $pinjam->delete();

      return "Data Teerhapus";
    }

    public function detail($id){
      $pinjam=Pinjam::find($id);

      return $pinjam;
    }
}
