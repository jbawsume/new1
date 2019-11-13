<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $guarded = [];

  public function books(){
    return $this->belongsTo(Category::class);
  }
}
