<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Projek;
class ProjekController extends Controller
{
    public function create(Request $req){
      $validasi = Validator::make($req->all(),[
        'namaprojek'=>'required|string|max:30'
      ]);
      if ($validasi->fails()) {
        return redirect('admin/dataprojek')->withErrors($validasi);
      }
      Projek::create([
        'nama'=>$req->namaprojek,
        'user_id'=>Auth::id()
      ]);

      return redirect('admin/dataprojek')->with('pesan', $req->namaprojek . " Berhasil Di Masukan");
    }

    public function readall(){
      return Projek::get();
    }

    public function delete(Request $req){
      projek::destroy($req->id);
      return redirect('admin/dataprojek');
    }
}
