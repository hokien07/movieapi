<?php


namespace App\Services;


use App\Models\Category;

class CategoryService extends ModelService
{
    public function __construct()
    {
        $this->model = resolve(Category::class);
    }

    public function getAll () {
        return $this->model->all();
    }
}
