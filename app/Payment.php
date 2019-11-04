<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['nama_file', 'nama_pengirim', 'status_upload_bukti', 'status_pembayaran', 'team_id'];

    public function team()
    {
        return $this->belongsTo("App\Team");
    }
}
