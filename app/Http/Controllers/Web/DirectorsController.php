<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\DirectorService;
use Illuminate\Http\Request;

class DirectorsController extends Controller
{
    private DirectorService $service;

    public function __construct( DirectorService $service)
    {
        $this->service = $service;
    }

    public function index (Request $request, $id) {
        $director = $this->service->findById($id);
        if(!$director) abort(404);
        $name = "Đạo diễn " . $director->name;
        $movies = $director->movies()->paginate(20);
        $year = \date('Y');
        $title = "Phim của đạo diễn $director->name - tổng hợp phim $director->name hay nhất";
        $description = "Phim của đạo diễn $director->name - tổng hợp phim $director->name hay nhất $year";
        $keywords = "xem phim $director->name, phim $director->name, tuyen tap phim $director->name phim mới nhất của $director->name năm $year";
        return view('archive', compact('movies', 'name', 'title', 'description', 'keywords'));
    }
}
