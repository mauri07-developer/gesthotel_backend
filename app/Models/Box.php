<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Box extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "id_company",
        "name",
        "comment",
        "state",
    ];

    //No show registers deleted
    protected $dates = ['deleted_at'];
}
