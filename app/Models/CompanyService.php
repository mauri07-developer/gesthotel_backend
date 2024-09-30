<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyService extends Model
{   
    protected $primaryKey = 'id_campany_service';

    use HasFactory,SoftDeletes;

    protected $fillable = [
        'company_id',
        'service_id',
        'comment',
        'price',
        'state'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    
}
