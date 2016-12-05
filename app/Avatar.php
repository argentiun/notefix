<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
  protected $fillable = ['src'];

  public function product()
  {
    return $this->belongsTo('App\User');
  }
}
