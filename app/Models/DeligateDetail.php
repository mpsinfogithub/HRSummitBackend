<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeligateDetail extends Model
{
    use HasFactory;

    public function deligate()
    {
        return $this->belongsTo(Deligate::class);
    }
}
