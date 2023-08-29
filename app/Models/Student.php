<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transportation;

class Student extends Model
{
    use HasFactory;
    
    public function rTransport()
    {
        return $this->hasMany(Transportation::class);
    }
}
