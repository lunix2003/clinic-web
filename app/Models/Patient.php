<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
        // 'is_place' => 'boolean',
    ];
    public static function show(){
        
    }
}

