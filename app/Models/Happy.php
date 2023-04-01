<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Happy extends Model
{
    use HasFactory;
    
    public function happy_detail()
    {
        return $this->hasMany(HappyDetail::class);
    }
}
