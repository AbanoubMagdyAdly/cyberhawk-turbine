<?php

namespace App\Services;

use App\Repositories\ComponentRepository;

class ComponentService
{
    public function __construct(
        private ComponentRepository $componentRepository,
    ) {
    }

    public function getAll() 
    {
        return $this->componentRepository->all(relations: ['turbines']);
    }

    public function store($component) 
    {
        return $this->componentRepository->create($component);
    }

    public function getOne($id) 
    {
        return $this->componentRepository->findOneByWithRelations(['id' => $id], ['turbines']);
    }

}