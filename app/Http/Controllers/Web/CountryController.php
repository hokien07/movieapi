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
        if(!$country) abort(404);
        $name = "Quốc gia " . $country->name;
        $movies = $country->movies()->paginate(20);
        $year = \date('Y');
        $title = "Danh sách phim $country->name - tổng hợp phim $country->name";
        $keywords = "Xem phim $country->name, Phim $country->name mới, Phim $country->name $year, phim hay";
        $description = "Phim $country->name mới nhất tuyển chọn hay nhất. Top những bộ phim $country->name đáng để bạn cày năm $year";
        return view('archive', compact('movies', 'name', 'title', 'description', 'keywords'));
    }
}
