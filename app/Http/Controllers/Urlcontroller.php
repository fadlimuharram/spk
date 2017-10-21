<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProjekController;

class Urlcontroller extends Controller
{


    public function admin($halaman){

      if ($halaman == "dashboard") {
        return view('adminpages.dashboard',['halaman'=>$halaman]);
      }elseif ($halaman == 'dataprojek') {

        $data = new \App\Http\Controllers\ProjekController;
        $data = $data->readall();
        return view('adminpages.dataprojek',['halaman'=>$halaman,'data_projek'=>$data]);
      }

      //not found Exception

    }

    public function kriteria($id){
      $datakriteria = new \App\Http\Controllers\KriteriaController;
      $datakriteria = $datakriteria->readall($id);
      $hasil_kriteria_spk = new \App\Http\Controllers\SPKController;
      $hasil_kriteria_spk = $hasil_kriteria_spk->kriteria_perhitunganspk($id);
      return view('adminpages.kriteriaprojek',['id_projek'=>$id,'data_kriteria'=>$datakriteria,'hasil_kriteria_spk'=>$hasil_kriteria_spk]);
    }

    public function alternative($id){
      return view('adminpages.alternativeprojek',['id_kriteria'=>'tes','data_alternative'=>null,'hasil_alternative_spk'=>'tes']);
    }
}
