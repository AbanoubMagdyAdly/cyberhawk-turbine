<?php

namespace App\Repositories;

use App\Models\TurbineComponents;

class TurbineComponentsRepository extends BaseRepository
{
    public function __construct(
        TurbineComponents $model,
    ) {
        $this->model = $model;
        parent::__construct($model);
    }
}
