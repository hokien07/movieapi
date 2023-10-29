<?php


namespace App\Services;


use App\Models\Actor;
use Illuminate\Support\Facades\Cache;

class ActorService extends ModelService
{
    public function __construct()
    {
        $this->model = resolve(Actor::class);
    }

    public function findById ($id) {
        return Cache::remember('actor_' . $id, $this->cacheTime, function () use ($id) {
            return $this->model->where('id', $id)->first();
        });
    }
}
