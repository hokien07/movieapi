<?php


namespace App\Services;
use App\Models\Category;

class CatService extends ModelService
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getAll () {
        return $this->model->query()->get();
    }

}
