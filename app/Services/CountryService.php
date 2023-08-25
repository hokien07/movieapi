<?php


namespace App\Services;


use App\Models\Country;

class CountryService extends ModelService
{
     public function __construct()
     {
         $this->setModel(resolve(Country::class));
     }

     public function getAll() {
         return $this->model->all();
     }
}
