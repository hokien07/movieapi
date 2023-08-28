<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class CatController extends Controller
{
    private CategoryService $service;

    public function __construct(CategoryService $service){
        $this->service = $service;
    }

    public function index (Request $request, $slug) {
        $cat = $this->service->getBySlug($slug);
        if(!$cat) abort(404);
        $name = "Thể loại " . $cat->name;
        $movies = $cat->movies()->paginate(20);
        $year = \date('Y');
        $title = "Danh sách phim $cat->name - tổng hợp phim $cat->name";
        $keywords = "Xem phim $cat->name, Phim $cat->name mới, Phim $cat->name $year, phim hay";
        $description = "Phim $cat->name mới nhất tuyển chọn hay nhất. Top những bộ phim $cat->name đáng để bạn cày năm $year";
       return view('archive', compact('movies', 'name', 'title', 'description', 'keywords'));
    }
}
