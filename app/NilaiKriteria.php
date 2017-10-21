<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiKriteria extends Model
{
    protected $table = "nilai_kriteria";
    protected $fillable = [
      'nilai',
      'datasatu',
      'datadua'
    ];
    public $timestamps = false;

}
