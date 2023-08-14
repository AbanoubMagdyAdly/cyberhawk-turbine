<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turbine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function components()
    {
        return $this->belongsToMany(Component::class, 'turbine_components', 'turbine_id', 'component_id')->withPivot(['last_grade', 'id']);
    }

    public function turbineComponents()
    {
        return $this->hasMany(TurbineComponents::class);
    }
}
