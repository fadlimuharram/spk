<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Alternative;
use App\Kriteria;
use App\NilaiAlternative;
use App\NilaiKriteria;
use App\Projek;

class SPKController extends Controller
{
    private function kriteria_perhitunganspk($idprojek){
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

  public function kriteria_priority_vector($idprojek){
    $kambali = [];
    $hasil = $this->kriteria_perhitunganspk($idprojek);
    $total = 0;
    foreach ($hasil as $key => $value) {
      $total += $value;
    }
    foreach ($hasil as $key => $value) {
      $kembali[$key] = $value / $total;
    }
    return $kembali;
  }


  private function alternative_perhitunganspk($idkriteria){
  $alternative = Alternative::where('kriteria_id',$idkriteria)->get()->toArray();
  $idalternative = [];
  $hitungjumlah = [];
  $loop = 0;
  foreach ($alternative as $key1 => $value1) {
    $idalternative[$key1] = $value1['id'];
    $datasatu_vertikal = NilaiAlternative::where('datadua',$value1['id'])->get()->toArray();
    $datasatu_horizontal = NilaiAlternative::where('datasatu',$value1['id'])->get()->toArray();
    $nilaidatasatu = 0;
    foreach ($datasatu_vertikal as $keydatasatu => $valuedatasatu) {
      $nilaidatasatu += $valuedatasatu['nilai'];
    }
    $hitungjumlah[$loop] = $nilaidatasatu;
    $loop++;
  }

  //dd($hitungjumlah);

  $hitungjumlahnormalisasi = [];
  foreach ($alternative as $key1 => $value1) {
    $datasatu_horizontal = NilaiAlternative::where('datasatu',$value1['id'])->orderBy('datadua','ASC')->get()->toArray();
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

public function alternative_priority_vector($idkriteria){
  $kambali = [];
  $hasil = $this->alternative_perhitunganspk($idkriteria);
  $total = 0;
  foreach ($hasil as $key => $value) {
    $total += $value;
  }
  foreach ($hasil as $key => $value) {
    $kembali[$key] = $value / $total;
  }
  return $kembali;
}


private function perhitungan_keseluruhan_alternative($idprojek){
  $kriteria = Kriteria::where('projek_id',$idprojek)->get()->toArray();
  $pv_alternative = [];
  foreach ($kriteria as $key => $value) {
    $pv_alternative[$key] = $this->alternative_priority_vector($value['id']);
  }
  return $pv_alternative;
}

public function keseluruhan_priority_vectir_alternative($idprojek){
  $keseluruhan = $this->perhitungan_keseluruhan_alternative($idprojek);
  $hasil = [];
  $jumlah_keseluruhan = count($keseluruhan);

  $ubah = []; //mengubah dari id kriteria menjadi index
  for ($i=0; $i < $jumlah_keseluruhan; $i++) {
    $ubah[$i] = array_values($keseluruhan[$i]);
  }

  $hitung = count($ubah[0]);

  //menghitung total horizontal
  for ($i=0; $i < count($ubah[0]); $i++) {
    $total = 0;
    for ($y=0; $y < $jumlah_keseluruhan; $y++) {
      $total += $ubah[$y][$i];
    }
    $hasil[$i] = $total;
  }

  $jumlah = 0;//jumlah vertikal dari perhitungan horizontal
  foreach ($hasil as $key => $value) {
    $jumlah += $value;
  }

  //menghitung pv
  $hitungpv = [];
  foreach ($hasil as $key => $value) {
    $hitungpv[$key] = $value / $jumlah;
  }

  //mengembalikan key(alternative) dan value(hasil pv)
  $kri = DB::table('projek')
        ->join('kriteria','projek.id','=','kriteria.projek_id')
        ->where('projek.id',$idprojek)
        ->get()
        ->toArray();

  $namaalte = DB::table('projek')
        ->join('kriteria','projek.id','=','kriteria.projek_id')
        ->join('alternative','kriteria.id','=','alternative.kriteria_id')
        ->where('alternative.kriteria_id',$kri[0]->id)
        ->get()
        ->toArray();

    $kembali = [];
    foreach ($namaalte as $key => $value) {
      $kembali[$value->nama] = $hitungpv[$key];
    }

  return $kembali;
}

//cek apakah user sudah mengisi keseluruhan alternative beserta bobotnya
public function cekalternative($idprojek){

  $kri = kriteria::where('projek_id',$idprojek)
        ->get()
        ->toArray();

  $alt_tersedia = DB::table('kriteria')
        ->join('alternative','kriteria.id','=','alternative.kriteria_id')
        ->where('kriteria.projek_id',$idprojek)
        ->get()
        ->toArray();


  $alt = DB::table('kriteria')
        ->join('alternative','kriteria.id','=','alternative.kriteria_id')
        ->where([
          ['kriteria.projek_id',$idprojek],
          ['alternative.kriteria_id',$kri[0]['id']]
        ])
        ->get()
        ->toArray();
      
  $totalalt = count($kri) * count($alt);

  if ($totalalt === 0) {
    return false;
  }

  if (count($alt_tersedia) == $totalalt) {
    return true;
  }else {
    return false;
  }
}


}
