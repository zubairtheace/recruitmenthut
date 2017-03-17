<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewType extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'name'
    ];
}
