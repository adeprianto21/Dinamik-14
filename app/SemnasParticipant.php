<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SemnasParticipant extends Model
{
    protected $fillable = ['nama', 'email', 'no_telp', 'instansi'];
}
