<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::has('screening')->get();
        return view('Welcome')
            ->with('movies', $movies);
    }
}
