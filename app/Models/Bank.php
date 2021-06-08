<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = ['bank','ctta','owner','condominio_id'];

    public function condominio(){
        return $this->belongsTo(Condominio::class);
    }
}
