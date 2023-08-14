<?php

namespace App\Repositories;

use App\Models\TurbineComponentInspections;

class TurbineComponentInspectionsRepository extends BaseRepository
{
    public function __construct(
        TurbineComponentInspections $model,
    ) {
        $this->model = $model;
        parent::__construct($model);
    }
}
