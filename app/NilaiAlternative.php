<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAlternative extends Model
{
    protected $table="nilai_alternative";
    protected $fillable = [
      'nilai',
      'datasatu',
      'datadua'
    ];
    public $timestamps = false;
}
