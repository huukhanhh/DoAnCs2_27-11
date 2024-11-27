<?php

namespace app\Repositories;

interface RepositoryInterface
{
    public function all();
    public function find(int $id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
}