<?php


namespace App\Services;


use App\Models\Director;
use Illuminate\Support\Facades\Cache;

class DirectorService extends ModelService
{
    public function __construct()
    {
        $this->model = resolve(Director::class);
    }

    public function findById ($id) {
        return Cache::remember('director_' . $id, $this->cacheTime, function () use ($id) {
           return $this->model->where('id', $id)->first();
        });
    }
}
