<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['user_id', 'nama_tim', 'competition_id', 'asal_sekolah', 'jumlah_anggota', 'lolos_final', 'juara'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function competition()
    {
        return $this->belongsTo('App\Competition');
    }

    public function instructor()
    {
        return $this->hasOne("App\Instructor");
    }

    public function participant()
    {
        return $this->hasMany("App\Participant");
    }

    public function payment()
    {
        return $this->hasOne("App\Payment");
    }

    public function creation()
    {
        return $this->hasOne("App\Creation");
    }
}
