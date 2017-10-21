<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alternative;
use App\NilaiAlternative;
class AlternativeController extends Controller
{
  public function create(Request $req){
    $validasi = Validator::make($req->all(),[
      "namaalternative"=>"required|array|min:3",
      "namaalternative.*"=>"required|string",
      "bobot"=>"required|array",
      "bobot.*"=>"required|string",
      "projekid"=>"required|exists:projek,id"

    ]);

    if ($validasi->fails()) {
      return redirect('admin/dataprojek')->withErrors($validasi);
    }


    $id_kriteria = [];
    foreach ($req->namakriteria as $value) {
      $id_kriteria[$value] = Alternative::create([
        "nama"=>$value,
        "projek_id"=>$req->projekid
      ])->id;
      Alternative::create([
        "nilai"=>"1",
        "datasatu"=>$id_kriteria[$value],
        "datadua"=>$id_kriteria[$value]
      ]);

    }

    foreach ($req->bobot as $value) {
      $pisah = explode("_",$value);

      NilaiAlternative::create([
        "nilai"=>$pisah[2],
        "datasatu"=>$id_kriteria[$pisah[0]],
        "datadua"=>$id_kriteria[$pisah[1]]
      ]);

      NilaiAlternative::create([
        "nilai"=>(1/$pisah[2]),
        "datasatu"=>$id_kriteria[$pisah[1]],
        "datadua"=>$id_kriteria[$pisah[0]]
      ]);

    }

  }

  public function readall($idprojek){
    return Kriteria::where('projek_id',$idprojek)->get();
  }
}
