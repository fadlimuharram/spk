<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Projek extends Model
{
  protected $table = "projek";
  protected $fillable = [
    'nama',
    'user_id'
  ];
  public $timestamps = true;

}
