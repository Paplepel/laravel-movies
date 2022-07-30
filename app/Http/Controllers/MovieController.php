<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    // function to redirect to view all movie
    public function index() {
        $movies = Movie::all();
        return view('admin.movie.index', [
            'movies' => $movies
        ]);
    }
}
