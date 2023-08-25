<?php


namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class ModelService
{
    protected Model $model;

    protected function setModel (Model $model) {
        $this->model = $model;
    }
}
