<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index (Request $request, $slug) {
        return view('archive');
    }
}
