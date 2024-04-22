<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transfer_zona extends Model
{
    use HasFactory;

    protected $table = 'transfer_zona';
    public $timestamps = false;

    protected $fillable = [
        'descripcion',
        'id_zona',
    ];
}