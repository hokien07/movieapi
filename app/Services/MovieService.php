<?php


namespace App\Services;
use App\Models\Movie;

class MovieService extends ModelService
{
    public function __construct(Movie $model)
    {
        parent::__construct($model);
    }

    public function getPopular () {
        return $this->model->query()->where('status', 'ongoing')->limit(5)->get();
    }

    public function getTrend () {
        return $this->model->query()->orderBy('view', "desc")->limit(5)->get();
    }

    public function topRate () {
        return $this->model->query()->where('status', 'completed')->orderBy('view', "desc")->limit(5)->get();
    }

    public function findByServerId ($serverId) {
        return $this->model->query()->where('server_id', $serverId)->first();
    }




}
