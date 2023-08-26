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
        $movies = [];
        $name = "";
        if($director) {
            $name = "Thể loại " . $director->name;
            $movies = $director->movies()->paginate(20);
        }
        return view('archive', compact('movies', 'name'));
    }
}
