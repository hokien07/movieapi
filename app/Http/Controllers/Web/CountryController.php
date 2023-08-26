<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    private CountryService $service;

    public function __construct(CountryService $service)
    {
        $this->service = $service;
    }

    public function index (Request $request, $slug) {
        $country = $this->service->findBySlug($slug);
        $movies = [];
        $name = "";
        if($country) {
            $name = "Thể loại " . $country->name;
            $movies = $country->movies()->paginate(20);
        }
        return view('archive', compact('movies', 'name'));
    }
}
