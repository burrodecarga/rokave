<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'condominio_id',
        'user_id',
        'address',
        'phone',
        'mobil',
        'area',
        'alicuota',
        'name'
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
