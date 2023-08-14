<?php

namespace App\Services;

use App\Repositories\ComponentRepository;
use App\Repositories\TurbineRepository;

class TurbineService
{
    public function __construct(
        private TurbineRepository $turbineRepository,
        private ComponentRepository $componentRepository,
    ) {
    }

    public function getAll() 
    {
        return $this->turbineRepository->all(relations: ['components']);
    }

    public function store($turbine) 
    {
        $components = $this->componentRepository->whereIdIn($turbine['components']);
        $turbine = $this->turbineRepository->create($turbine);
        $turbine->components()->attach($components);
        return $turbine;
    }

    public function getOne($id) 
    {
        return $this->componentRepository->findByWithRelations(['id' => $id], ['components']);
    }

    public function detachComponent($turbineId, $componentIds) 
    {
        $turbine = $this->turbineRepository->find($turbineId);
        $components = $this->componentRepository->whereIdIn($componentIds);
        $turbine->components()->detach($components);
        return $turbine;
    }

    public function attachComponent($turbineId, $componentIds) 
    {
        $turbine = $this->turbineRepository->find($turbineId);
        $components = $this->componentRepository->whereIdIn($componentIds);
        $turbine->components()->attach($components);
        return $turbine;
    }
}
