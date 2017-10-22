<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    protected $table="alternative";
    protected $fillable = [
      'nama',
      'user_id',
      'kriteria_id'
    ];
    public $timestamps = false;
}
