<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;

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
    protected $dates = ['deleted_at'];
}
