<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = ['nama', 'nip', 'no_telp', 'no_wa', 'team_id'];

    public function team()
    {
        return $this->belongsTo("App\Team");
    }
}
