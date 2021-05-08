<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plantation extends Model
{
    protected $fillable = [
        'id',
        'id_specie',
        'quantity',
        'start_time',
        'end_time',
        'status',
        'description',
        'created_at',
        'updated_at',
    ];
}
