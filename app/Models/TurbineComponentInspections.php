<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TurbineComponentInspections extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id',
        'turbine_components_id',
        'grade',
    ];

    public function turbineComponents(): BelongsTo
    {
        return $this->belongsTo(TurbineComponents::class);
    }

    public function inspection(): BelongsTo
    {
        return $this->belongsTo(Inspection::class);
    }
}