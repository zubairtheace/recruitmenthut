<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'application_id',
        'interviewer_id',
        'interview_type_id',
        'scheduled_on',
        'notes',
        'rating'
    ];

    public function application(){
        return $this->hasOne('App\Application', 'id');
    }

    public function interviewer(){
        return $this->hasOne('App\User', 'id');
    }

    public function interviewType(){
        return $this->hasOne('App\interviewType', 'id');
    }


}
