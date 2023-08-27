<?php


namespace App\Services;


use App\Models\Actor;

class ActorService extends ModelService
{
    public function __construct()
    {
        $this->model = resolve(Actor::class);
    }

    public function findById ($id) {
        return $this->model->where('id', $id)->first();
    }
}
