<?php

namespace App\Repositories;

use App\Models\Component;

class ComponentRepository extends BaseRepository
{
    public function __construct(
        Component $model,
    ) {
        $this->model = $model;
        parent::__construct($model);
    }
}
