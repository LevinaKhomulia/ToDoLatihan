<?php

namespace App\Repositories;

use App\Todo;

interface TodoInterface{
    public function create(string $description, $status);
    public function all();
    public function get(int $id);
    public function update(int $id, string $description, $status);
    public function delete(int $id);
} 