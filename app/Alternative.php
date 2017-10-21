<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    protected $table="alternative";
    protected $fillable = [
      'nama'
    ];
    public $timestamps = false;
}
