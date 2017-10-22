<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjekController;
use App\Kriteria;
use App\Projek;

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
      $hasil_kriteria_spk = '';
      $hasil_kesimpulan = '';
      $hasil_kesimpulan_alternative = '';
      if (count($datakriteria) != 0) {
        $baru = new \App\Http\Controllers\SPKController;
        $hasil_kriteria_spk = $baru->kriteria_priority_vector($id);

        if ($baru->cekalternative($id) !== false) {
          $hasil_kesimpulan = $baru->keseluruhan_priority_vectir_alternative($id);
        }

      }


      return view('adminpages.kriteriaprojek',[
        'id_projek'=>$id,
        'data_kriteria'=>$datakriteria,
        'hasil_kriteria_spk'=>$hasil_kriteria_spk,
        'hasil_kesimpulan'=>$hasil_kesimpulan
      ]);
    }

    public function alternative($id){
      $baru = new \App\Http\Controllers\AlternativeController;
      $dataalternative = $baru->readall($id);
      $data_alternative_sebelumnya = '';
      $hasil_alternative_spk = '';

      if (count($dataalternative) != 0) {
        $hasil_alternative_spk = new \App\Http\Controllers\SPKController;
        $hasil_alternative_spk = $hasil_alternative_spk->alternative_priority_vector($id);

      }

      $pk = $baru->get_alternative_perkriteria($id);
      
      if (count($pk) != 0) {
        $data_alternative_sebelumnya = $pk;
      }

      return view('adminpages.alternativeprojek',[
        'id_kriteria'=>$id,
        'nama_kriteria'=>Kriteria::where('id',$id)->get()->toArray()[0]['nama'],
        'data_alternative'=>$dataalternative,
        'data_alternative_sebelumnya'=>$data_alternative_sebelumnya,
        'hasil_alternative_spk'=>$hasil_alternative_spk
      ]);
    }
}
