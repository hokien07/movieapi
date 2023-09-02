<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Services\MovieService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $movie->fill(['view' => $movie->view + 1])->save();
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

    public function danhSach (Request $request, $type) {
        switch ($type) {
            case "phim-chieu-rap":
                $name = "Danh sách phim chiếu rạp";
                $movies = $this->service->getPhimRap(20, 'view', true);
                break;
            case "phim-bo":
                $name = "Dsanh sách phim bộ";
                $movies = $this->service->getByType('series', 20, 'view', true);
                break;
            case "phim-le":
                $name = "Danh sách phim lẻ";
                $movies = $this->service->getByType('single', 20, 'view', true);
                break;
            case "hoat-hinh":
                $name = "Danh sách phim hoạt hình";
                $movies = $this->service->getByType('hoathinh', 20, 'view', true);
                break;
            case "phim-thuyet-minh":
                $name = "Danh sách phim thuyết minh";
                $movies = $this->service->getPhimThuyetMinh(20, 'view', true);
                break;
            case "phim-long-tieng":
                $name = "Danh sách phim lồng tiếng";
                $movies = $this->service->getPhimLongTieng(20, 'view', true);
                break;
            default:
                $name = "Danh sách phim";
                $movies = $this->service->getRanDomForSlide(true);
                break;
        }
        return view('archive', compact('movies', 'name'));
    }

}
