<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacancy extends Model
{
     use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
      'name',
      'closing_date',
      'description'
    ];

    protected $dates = ['deleted_at'];

}
