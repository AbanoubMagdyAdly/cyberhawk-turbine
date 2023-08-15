<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $with = [
        'turbineComponentInspections',
        'turbineComponentInspections.component',
        'turbineComponentInspections.turbine',
    ];

    public function turbineComponentInspections()
    {
        return $this->belongsToMany(
            TurbineComponents::class,
            'turbine_component_inspections',
            'inspection_id',
            'turbine_components_id'
        )->withPivot('grade');
    }
}
