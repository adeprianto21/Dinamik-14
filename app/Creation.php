<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    protected $fillable = ['link_1', 'link_2', 'team_id'];

    public function team()
    {
        return $this->belongsTo("App\Team");
    }
}
