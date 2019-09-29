<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['user_id', 'nama_tim', 'competition_id', 'asal_sekolah'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function competition()
    {
        return $this->belongsTo('App\Competition');
    }
}
