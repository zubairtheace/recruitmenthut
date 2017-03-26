<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecruiterInfo extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'position_id'
    ];

    protected $table = "recruiter_infos";

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function position(){
        return $this->hasOne('App\Position', 'id');
    }
}
