<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HappyDetail extends Model
{
    use HasFactory;
    
    public function happy()
    {
        return $this->belongsTo(Happy::class);
    }
}
