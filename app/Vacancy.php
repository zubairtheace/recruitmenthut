<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'name',
      'valid_to',
      'description'
    ];

}
