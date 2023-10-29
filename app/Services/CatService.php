<?php


namespace App\Services;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CatService extends ModelService
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getAll () {
        return Cache::remember('categories', $this->cacheTime, function () {
           return $this->model->query()->get();
        });
    }

}
