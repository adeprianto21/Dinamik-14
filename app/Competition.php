<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = ['nama_competition', 'jumlah_peserta'];

    public function team()
    {
        return $this->hasOne('App\Team');
    }
}
