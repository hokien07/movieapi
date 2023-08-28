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
        $title = "$movie->name | $movie->origin_name | " .$episode->server->name;
        $keywords = "$movie->name | $movie->origin_name | " .$episode->server->name;
        $description = "$movie->description";
        return view('movie', compact('movie', 'movies', 'episode', 'title', 'description', 'keywords'));
    }

    public function view (Request $request, $slug, $episode) {
        $movie = $this->service->findBySlug($slug);
        if(!$movie) abort(404);
        $categories = $movie->categories->pluck('id');
        $movies = $this->service->getSameMovieByCatIds($categories->toArray(), $movie->id);
        $episodes = $movie->episodes;
        $firstEpisode = $episodes->where('name', $episode)->first();
        if(!$firstEpisode) $firstEpisode = $episodes->first();
        $title = "$movie->name | $movie->origin_name | " .$firstEpisode->server->name;
        $keywords = "$movie->name | $movie->origin_name | " .$firstEpisode->server->name;
        $description = "$movie->description";
        return view('view', compact('movie', 'movies', 'episodes', 'firstEpisode', 'title', 'description', 'keywords'));
    }

    public function search(Request $request) {
        $search = $request->input('search');
        if(empty($search)) return back();
        $name = "Kết quả tìm kiếm " . $search;
        $movies =  $this->service->filter($search);
        $title = $name;
        return view('archive', compact('movies', 'name', 'title'));
    }

}
