<?php


namespace App\Services;


use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryService extends ModelService
{
    public function __construct()
    {
        $this->model = resolve(Category::class);
    }

    public function getAll () {
        return Cache::remember('categories', $this->cacheTime, function () {
           return $this->model->whereNotIn('id', [env('PHIM_18')])->get();
        });
    }

    public function getBySlug ($slug) {
        return Cache::remember($slug, $this->cacheTime, function () use ($slug) {
            return $this->model->where('slug', $slug)->first();
        });
    }
}
