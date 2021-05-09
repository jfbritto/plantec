<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'id',
        'id_plantation',
        'id_user',
        'quantity',
        'price',
        'status',
        'description',
        'created_at',
        'updated_at',
    ];
}
