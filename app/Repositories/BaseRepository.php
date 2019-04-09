<?php

namespace App\Repositories;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;
use Exception;
use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    private $app;

    protected $model;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract function model();

    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if(!$model instanceof Model)
        {
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    public function all($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    public function withCount($columns)
    {
        return $this->model->withCount($columns)->get();
    }

    public function findBy($attribute, $value)
    {
        return $this->model->where($attribute, '=', $value)->firstOrFail();
    }

    public function findWhere($attribute, $value, $columns = ['*'])
    {
        return $this->model->where($attribute, $value)->get($columns);
    }

    public function search($attribute = [], $search)
    {
        return $this->model->query()
            ->where($attribute[0], 'like', "%{$search}%")
            ->orWhere($attribute[1], 'like', "%{$search}%")
            ->latest()
            ->get();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function orderByRaw($query, $value)
    {
        return $this->model->orderByRaw($query)->take($value)->get();
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function create($data = [])
    {
        return $this->model->create($data);
    }

    public function findWhereIn($field, $value, $columns = ['*'])
    {
        return $this->model->whereIn($field, $value)->get($columns);
    }

    public function update($id, $data = [])
    {
        $result = $this->find($id);
        if ($result)
        {
            $result->update($data);
            return $result;
        }

        return false;
    }
}
