<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Kriteria;
use App\NilaiKriteria;

class KriteriaController extends Controller
{
    public function create(Request $req){
      $validasi = Validator::make($req->all(),[
        "namakriteria"=>"required|array|min:3",
        "namakriteria.*"=>"required|string",
        "bobot"=>"required|array",
        "bobot.*"=>"required|string",
        "projekid"=>"required|exists:projek,id"
      ]);

      if ($validasi->fails()) {
        return redirect('admin/dataprojek')->withErrors($validasi);
      }


      $id_kriteria = [];
      foreach ($req->namakriteria as $value) {
        $id_kriteria[$value] = Kriteria::create([
          "nama"=>$value,
          "projek_id"=>$req->projekid
        ])->id;
        NilaiKriteria::create([
          "nilai"=>"1",
          "datasatu"=>$id_kriteria[$value],
          "datadua"=>$id_kriteria[$value]
        ]);

      }

      foreach ($req->bobot as $value) {
        $pisah = explode("_",$value);

        NilaiKriteria::create([
          "nilai"=>$pisah[2],
          "datasatu"=>$id_kriteria[$pisah[0]],
          "datadua"=>$id_kriteria[$pisah[1]]
        ]);

        NilaiKriteria::create([
          "nilai"=>(1/$pisah[2]),
          "datasatu"=>$id_kriteria[$pisah[1]],
          "datadua"=>$id_kriteria[$pisah[0]]
        ]);

      }

      return redirect('/admin/kriteria/' . $req->projekid);

    }

    public function readall($idprojek){
      return Kriteria::where('projek_id',$idprojek)->get();
    }

}
