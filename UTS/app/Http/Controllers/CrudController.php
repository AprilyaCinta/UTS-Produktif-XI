<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;
class CrudController extends Controller
{
    //
    public function index(){
      $crud=Crud::all();

      $data=['crud'=>$crud];

      return $data;
    }

    public function create(Request $request){
      $crud=new Crud();
      $crud->nama_mobil=$request->nama_mobil;
      $crud->merk=$request->merk;
      $crud->bahan_bakar=$request->bahan_bakar;
      $crud->plat_nomor=$request->plat_nomor;
      $crud->warna=$request->warna;
      $crud->jumlah=$request->jumlah;
      $crud->save();

      return "Data Tersimpan";
    }

    public function update(Request $request, $id){
      $crud=Crud::find($id);
      $crud->nama_mobil=$request->nama_mobil;
      $crud->merk=$request->merk;
      $crud->bahan_bakar=$request->bahan_bakar;
      $crud->plat_nomor=$request->plat_nomor;
      $crud->warna=$request->warna;
      $crud->jumlah=$request->jumlah;
      $crud->save();

      return "Data Terupdate";
    }

    public function delete($id){
      $crud=Crud::find($id);
      $crud->delete();

      return "Data Terhapus";
    }

    public function detail($id){
      $crud=Crud::find($id);

      return $crud;
    }
}
