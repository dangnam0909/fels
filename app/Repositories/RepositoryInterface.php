<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function all($columns = ['*']);

    public function withCount($columns);

    public function findBy($attribute, $value);

    public function findWhere($attribute, $value, $columns = ['*']);

    public function search($attribute = [], $search);

    public function getById($id);

    public function orderByRaw($query, $value);

    public function find($id, $columns = array('*'));

    public function create($data = []);

    public function findWhereIn($field, $value, $columns = ['*']);

    public function update($id, $data = []);
}
