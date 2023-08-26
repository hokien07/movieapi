<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CatController extends Controller
{
    private CategoryService $service;

    public function __construct(CategoryService $service){
        $this->service = $service;
    }

    public function index (Request $request, $slug) {
        $cat = $this->service->getBySlug($slug);
        $movies = null;
        if($cat) {
            $movies = $cat->movie;
        }
        dd($movies);
       return view('archive');
    }
}
