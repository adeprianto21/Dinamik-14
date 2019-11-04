<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = ['nama_competition', 'jumlah_peserta', 'biaya_pendaftaran'];

    public function team()
    {
        return $this->hasMany('App\Team');
    }
}
