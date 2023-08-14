<?php

namespace App\Services;

use App\Repositories\InspectionRepository;
use App\Repositories\TurbineComponentInspectionsRepository;
use App\Repositories\TurbineComponentsRepository;

class InspectionService
{
    public function __construct(
        private InspectionRepository $inspectionRepository,
        private TurbineComponentsRepository $turbineComponentsRepository,
        private TurbineComponentInspectionsRepository $turbineComponentInspectionsRepository,
    ) {
    }

    public function getAll() 
    {
        return $this->inspectionRepository->all();
    }

    public function store($inspectionData) 
    {
        $inspection = \DB::transaction(function () use ($inspectionData) {
            $turbineComponentInspections = [];
            $inspection = $this->inspectionRepository->create([]);
            foreach ($inspectionData as $key => $value) {
                $turbineComponentInspections []= array_merge($value, ["inspection_id" => $inspection->id]);
                $this->turbineComponentsRepository->update($value['turbine_components_id'], ['last_grade' => $value['grade']]);
            }
            $this->turbineComponentInspectionsRepository->insert($turbineComponentInspections);
            return $inspection->refresh();
        });

        return $inspection;
    }

    public function getOne($id) 
    {
        return $this->inspectionRepository->find($id);
    }

}
