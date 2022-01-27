<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company_id',
    ];

    function company(){
        return $this->belongsTo('App\Models\Company', 'company_id');
    }
    function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
