<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Movie;
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
        if(!$movie) abort(404);
        $categories = $movie->categories->pluck('id');
        $movies = $this->service->getSameMovieByCatIds($categories->toArray(), $movie->id);
        $episode = $movie->episodes->first();
        return view('movie', compact('movie', 'movies', 'episode'));
    }

    public function view (Request $request, $slug) {
        $movie = $this->service->findBySlug($slug);
        if(!$movie) abort(404);
        $categories = $movie->categories->pluck('id');
        $movies = $this->service->getSameMovieByCatIds($categories->toArray(), $movie->id);
        $episodes = $movie->episodes;
        $firstEpisode = $episodes->first();
        return view('view', compact('movie', 'movies', 'episodes', 'firstEpisode'));
    }

}
