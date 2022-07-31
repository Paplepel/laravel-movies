<?php

namespace App\Http\Controllers;

use App\Models\Screening;
use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::has('screening')->get();
        return view('Welcome')
            ->with('movies', $movies);
    }

    //Function to show cinemas for a specific movie
    public function cinemas($movie_id)
    {
        $movie = Movie::find($movie_id);
        $cinemas = DB::table('cinemas')
            ->join('screenings', 'cinemas.id', '=', 'screenings.cinema_id')
            ->join('movies', 'screenings.movie_id', '=', 'movies.id')
            ->where('movies.id', $movie_id)
            ->select('cinemas.id', 'cinemas.name','cinemas.location')
            ->distinct()
            ->get();
        return view('cinemas')
            ->with('movie', $movie)
            ->with('cinemas', $cinemas);
    }
}
