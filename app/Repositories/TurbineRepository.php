<?php

namespace App\Repositories;

use App\Models\Turbine;

class TurbineRepository extends BaseRepository
{
    public function __construct(
        Turbine $model,
    ) {
        $this->model = $model;
        parent::__construct($model);
    }
}
