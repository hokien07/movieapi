<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\ActorService;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    private ActorService $service;

    public function __construct( ActorService $service)
    {
        $this->service = $service;
    }

    public function index (Request $request, $id) {
        $director = $this->service->findById($id);
        if(!$director) abort(404);
        $name = "Diễn viên " . $director->name;
        $movies = $director->movies()->paginate(20);
        $year = date('Y');
        $title = "Phim của diễn viên $director->name - tổng hợp phim $director->name hay nhất";
        $description = "Phim của diễn viên $director->name - tổng hợp phim $director->name hay nhất $year";
        $keywords = "xem phim $director->name, phim $director->name, tuyen tap phim $director->name phim mới nhất của $director->name năm $year";
        return view('archive', compact('movies', 'name', 'title', 'description', 'keywords'));
    }
}
