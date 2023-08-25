<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index (Request $request, $slug) {
        return view('movie');
    }
}
