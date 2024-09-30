<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyBox extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'box_id',
        'date_initial',
    ];

    protected $dates = ['deleted_at'];

    public function box(){
        return $this->belongsTo(Box::class);
    }
}
