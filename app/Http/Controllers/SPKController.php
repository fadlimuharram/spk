<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alternative;
use App\Kriteria;
use App\NilaiAlternative;
use App\NilaiKriteria;
use App\Projek;

class SPKController extends Controller
{
  public function kriteria_perhitunganspk($idprojek){
  $kriteria = Kriteria::where('projek_id',$idprojek)->get()->toArray();
  $idkriteria = [];
  $hitungjumlah = [];
  $loop = 0;
  foreach ($kriteria as $key1 => $value1) {
    $idkriteria[$key1] = $value1['id'];
    $datasatu_vertikal = NilaiKriteria::where('datadua',$value1['id'])->get()->toArray();
    $datasatu_horizontal = NilaiKriteria::where('datasatu',$value1['id'])->get()->toArray();
    $nilaidatasatu = 0;
    foreach ($datasatu_vertikal as $keydatasatu => $valuedatasatu) {
      $nilaidatasatu += $valuedatasatu['nilai'];
    }
    $hitungjumlah[$loop] = $nilaidatasatu;
    $loop++;
  }

  //dd($hitungjumlah);

  $hitungjumlahnormalisasi = [];
  foreach ($kriteria as $key1 => $value1) {
    $datasatu_horizontal = NilaiKriteria::where('datasatu',$value1['id'])->orderBy('datadua','ASC')->get()->toArray();
    $nilai = 0;
    $loop = 0;
    foreach ($datasatu_horizontal as $key2 => $value2) {
      $nilai += $value2['nilai'] / $hitungjumlah[$loop];
      if ($loop == count($hitungjumlah)) {
        $loop = 0;
      }
      $loop++;
    }
    //echo"<br />";
    $hitungjumlahnormalisasi[$value1['id']] = $nilai;




  }

  return $hitungjumlahnormalisasi;

}
}
