<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateInfo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'cv',
        'certificates'
    ];

    protected $table = 'candidate_infos';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    protected $dates = ['deleted_at'];
}
