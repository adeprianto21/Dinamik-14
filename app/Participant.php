<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['nama', 'nisn', 'no_telp', 'no_wa', 'nama_file_foto', 'nama_file_kartu', 'team_id'];

    public function team()
    {
        return $this->belongsTo("App\Team");
    }
}
