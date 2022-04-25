<?php

namespace App\Models;

class Country extends BaseModel
{
    protected $fillable = [
        'name',
        'continent',
        'capital_city',
        'area',
        'population',
        'population_density',
    ];

    protected $casts = [
        'id' => 'integer',
        'area' => 'double',
        'population' => 'integer',
        'population_density' => 'double',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
