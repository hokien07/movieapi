<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\MovieService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private MovieService $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index () {
        $phimRap = $this->movieService->getPhimRap();
        $phimHoatHinh = $this->movieService->getByType('hoathinh');
        $slider = $this->movieService->getRanDomForSlide();
        $trending = $this->movieService->getTrending();
        return view('home', compact('phimRap', 'phimHoatHinh', 'slider', 'trending'));
    }
}
