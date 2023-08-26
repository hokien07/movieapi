<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    private MovieService $service;

    public function __construct( MovieService $service)
    {
        $this->service = $service;
    }

    public function index (Request $request, $slug) {
        $movie = $this->service->findBySlug($slug);
        $categories = $movie->categories->pluck('id');
        $movies = $this->service->getSameMovieByCatIds($categories->toArray(), $movie->id);
        return view('movie', compact('movie', 'movies'));
    }
}
