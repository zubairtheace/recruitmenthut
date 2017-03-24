<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'position_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function position(){
        return $this->hasOne('App\Position', 'id');
    }
}
