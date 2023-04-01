<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deligate extends Model
{
    use HasFactory;

    public function deligate_detail()
    {
        return $this->hasMany(DeligateDetail::class);
    }
}
