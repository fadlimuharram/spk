<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Alternative;
use App\NilaiAlternative;
use App\Kriteria;
use Illuminate\Support\Facades\DB;
class AlternativeController extends Controller
{
  public function create(Request $req){
    $validasi = Validator::make($req->all(),[
      "namaalternative"=>"required|array|min:3",
      "namaalternative.*"=>"required|string",
      "bobot"=>"required|array",
      "bobot.*"=>"required|string",
      "kriteriaid"=>"required|exists:kriteria,id"

    ]);

    if ($validasi->fails()) {
      return redirect('admin/alternative/'.$req->kriteriaid)->withErrors($validasi);
    }

    $id_alternative = [];
    foreach ($req->namaalternative as $value) {
      $id_alternative[$value] = Alternative::create([
        "nama"=>$value,
        "kriteria_id"=>$req->kriteriaid,
        "user_id"=>Auth::id()
      ])->id;
      NilaiAlternative::create([
        "nilai"=>"1",
        "datasatu"=>$id_alternative[$value],
        "datadua"=>$id_alternative[$value]
      ]);

    }

    foreach ($req->bobot as $value) {
      $pisah = explode("_",$value);

      NilaiAlternative::create([
        "nilai"=>$pisah[2],
        "datasatu"=>$id_alternative[$pisah[0]],
        "datadua"=>$id_alternative[$pisah[1]]
      ]);

      NilaiAlternative::create([
        "nilai"=>(1/$pisah[2]),
        "datasatu"=>$id_alternative[$pisah[1]],
        "datadua"=>$id_alternative[$pisah[0]]
      ]);

    }

    return redirect('/admin/alternative/' . $req->kriteriaid);

  }

  public function readall($idkriteria){
    return Alternative::where('kriteria_id',$idkriteria)->get();
  }

  public function get_alternative_perkriteria($idkriteria){
    //ambil id kriteria pertama
    $idprojek = Kriteria::where('id',$idkriteria)
          ->get()
          ->toArray()[0]['projek_id'];


    $kri = kriteria::where('projek_id',$idprojek)
          ->get()
          ->toArray();

    $alt = Alternative::where('kriteria_id',$kri[0]['id'])
          ->get()
          ->toArray();
        
    return $alt;

  }


}
