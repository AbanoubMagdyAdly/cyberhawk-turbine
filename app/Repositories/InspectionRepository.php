<?php

namespace App\Repositories;

use App\Models\Inspection;

class InspectionRepository extends BaseRepository
{
    public function __construct(
        Inspection $model,
    ) {
        $this->model = $model;
        parent::__construct($model);
    }
}
