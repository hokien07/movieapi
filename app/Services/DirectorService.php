<?php


namespace App\Services;


use App\Models\Director;

class DirectorService extends ModelService
{
    public function __construct()
    {
        $this->model = resolve(Director::class);
    }

    public function findById ($id) {
        return $this->model->where('id', $id)->first();
    }
}
