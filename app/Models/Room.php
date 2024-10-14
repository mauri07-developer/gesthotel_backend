<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory,SoftDeletes;
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'room_id';

    protected $fillable = [
        "floor_id",
        "type_room_id",
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
    public function floor(){
        return $this->belongsTo(Floor::class);
    }

    public function type(){
        return $this->belongsTo(TypeRoom::class);
    }
}
