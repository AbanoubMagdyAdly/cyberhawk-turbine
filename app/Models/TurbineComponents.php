<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TurbineComponents extends Model
{
    use HasFactory;

    protected $fillable = [
        'turbine_id',
        'component_id',
        'last_grade',
    ];

    public function turbine(): BelongsTo
    {
        return $this->belongsTo(Turbine::class);
    }

    public function component(): BelongsTo
    {
        return $this->belongsTo(Component::class);
    }

    public function inspections()
    {
        return $this->hasMany(TurbineComponentInspections::class);
    }
}
