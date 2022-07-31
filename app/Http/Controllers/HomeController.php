<?php

namespace App\Http\Controllers;

use App\Models\Screening;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Cinema;
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

    // Function to show screening for a selected movie and cinema
    public function screenings($movie_id, $cinema_id)
    {
        $movie = Movie::find($movie_id);
        $cinema = Cinema::find($cinema_id);
        $screenings = Screening::where('movie_id', $movie_id)
            ->where('cinema_id', $cinema_id)
            ->With('cinema', 'movie', 'room','slot')
            ->get();
        return view('screenings')
            ->with('cinema', $cinema)
            ->with('movie', $movie)
            ->with('screenings', $screenings);
    }

    // Function to show screenings for a selected movie and cinema and date
    public function dateSearch(Request $request)
    {
        $movie = Movie::find($request->movie_id);
        $cinema = Cinema::find($request->cinema_id);
        $screenings = Screening::where('movie_id', $request->movie_id)
            ->where('date','<=' ,$request->to_date)
            ->where('date','>=' ,$request->from_date)
            ->where('cinema_id', $request->cinema_id)
            ->With('cinema', 'movie', 'room','slot')
            ->get();
        return view('screenings')
            ->with('from_date', $request->from_date)
            ->with('to_date', $request->to_date)
            ->with('cinema', $cinema)
            ->with('movie', $movie)
            ->with('screenings', $screenings);
    }
}
