<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserType extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
    protected $dates = ['deleted_at'];
}
