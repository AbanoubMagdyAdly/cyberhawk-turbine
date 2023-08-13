<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param       $id
     * @param array $data
     *
     * @return bool
     */
    public function update($id, array $data)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    /**
     * @param  array  $conditions
     * @param  array  $data
     *
     * @return bool
     */
    public function updateWhere(array $conditions, array $data)
    {
        return $this->model->where($conditions)->update($data);
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function whereIdIn($array)
    {
        return $this->model->whereIn('id', $array)->get();
    }

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all($columns = ['*'], string $orderBy = 'id', string $sortBy = 'asc', $relations = [])
    {
        return $this->model->with($relations)->orderBy($orderBy, $sortBy)->get($columns);
    }

    public function findByWithRelations(array $data, array $relations = [])
    {
        return $this->model->where($data)->with($relations)->get();
    }

    public function findOneByWithRelations(array $data, array $relations = [])
    {
        return $this->model->where($data)->with($relations)->first();
    }

    public function first()
    {
        return $this->model->first();
    }
}
