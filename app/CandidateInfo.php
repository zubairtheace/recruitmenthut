<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateInfo extends Model
{
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
}
