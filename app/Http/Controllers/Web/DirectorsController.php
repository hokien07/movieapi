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
        return view('archive', compact('movies', 'name'));
    }
}
