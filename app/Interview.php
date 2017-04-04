<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interview extends Model
{
    use SoftDeletes;

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
        return $this->hasOne('App\User', 'id', 'interviewer_id');
    }

    public function interviewType(){
        return $this->hasOne('App\interviewType', 'id', 'interview_type_id');
    }

    protected $dates = ['deleted_at'];

}
