<?php


namespace App\Services;


use App\Models\Country;
use Illuminate\Support\Facades\Cache;

class CountryService extends ModelService
{
     public function __construct()
     {
         $this->setModel(resolve(Country::class));
     }

     public function getAll() {
         return Cache::remember('countries', $this->cacheTime, function () {
            return $this->model->all();
         });
     }

     public function findBySlug ($slug) {
         return Cache::remember($slug, $this->cacheTime, function () use ($slug){
            return $this->model->where('slug', $slug)->first();
         });
     }
}
