<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory,SoftDeletes;

    protected $primaryKey = 'service_id';

    protected $fillable = [
        "user_inserted_id",
        "name",
        "descripcion",
        "state",
    ];

    //No show registers deleted
    protected $dates = ['deleted_at'];

    public function user (){
        return $this->belongsTo(User::class,'user_inserted_id');
    }

}
