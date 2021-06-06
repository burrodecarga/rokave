<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
    use HasFactory;

    protected $fillable =[
            'name',
            'rut',
            'address',
            'phone',
            'mobil',
            'email',
            'logo',
            'user_id'
    ];

    public function administrador(){
        return $this->belongsTo(User::class,'user_id');
    }
}
