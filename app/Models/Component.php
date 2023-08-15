<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function turbines()
    {
        return $this->belongsToMany(
            Turbine::class,
            'turbine_components',
            'component_id',
            'turbine_id'
        )->withPivot('last_grade');
    }
}
