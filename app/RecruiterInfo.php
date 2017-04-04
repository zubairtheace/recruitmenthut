<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecruiterInfo extends Model
{
    use SoftDeletes;

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
        return $this->hasOne('App\Position', 'id', 'position_id');
    }
    protected $dates = ['deleted_at'];
}
