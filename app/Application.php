<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'candidate_id',
        'vacancy_id',
        'date_applied',
        'overall_rating'
    ];

    public function candidate(){
        return $this->hasOne('App\User', 'id');
    }

    public function vacancy(){
        return $this->hasOne('App\Vacancy', 'id');
    }
}
