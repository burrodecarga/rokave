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

    public function socials(){
        return $this->hasMany(Social::class);
    }

    public function banks(){
        return $this->hasMany(Bank::class);
    }

    public function interests(){
        return $this->hasMany(Interest::class);
    }
}
