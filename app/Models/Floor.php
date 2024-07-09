<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $table = 'floors';
    protected $fillable = [
        'name',
        'level',
        'description',
        'room_count',
        'status'
    ];
}
