<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    protected $fillable = [
        'id',
        'name',
        'status',
        'description',
        'created_at',
        'updated_at',
    ];
}
