<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transfer_precios extends Model
{
    use HasFactory;

    protected $table = 'transfer_precios';
    public $timestamps = false;

    protected $fillable = [
        'id_hotel',
        'id_precios',
        'id_vehiculo',
        'Precio',
    ];
}