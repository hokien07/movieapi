<?php


namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class ModelService
{
    protected Model $model;
    public int $cacheTime = 72000;

    protected function setModel (Model $model) {
        $this->model = $model;
    }
}
