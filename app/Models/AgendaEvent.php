<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaEvent extends Model
{
    use HasFactory;

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }
}
