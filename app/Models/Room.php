<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bedroom extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "id_floor",
        "id_type_room",
        "name",
        "availability",
        "price",
        "user_inserted",
        "user_edit",
        "state",
    ];

    //No show registers deleted
    protected $dates = ['deleted_at'];

    //relation with other models
}
