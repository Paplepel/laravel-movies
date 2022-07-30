<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    // function to redirect to view all movie
    public function index() {
        $movies = Movie::all();
        return view('admin.movies.index', [
            'movies' => $movies
        ]);
    }

    // function to redirect to add movie page
    public function create() {
        return view('admin.movies.create');
    }

    // function to add movie record to the database
    public function postmovie(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        //save the image to file format
        $movie_banner = file($request['movie_banner']);
        $movie_poster = file($request['movie_poster']);


        $banner_name = rand(1000,9999).'.'.$request['movie_banner']->extension();
        $poster_name = rand(1000,9999).'.'.$request['movie_poster']->extension();


        //moves the image to folder
        $request['movie_banner']->move(public_path('movieimage'),$banner_name);
        $request['movie_poster']->move(public_path('movieimage'),$poster_name);

        $movie = Movie::create($request->toArray());

        return redirect('movies')
            ->with('status', 'Movie added successfully');
    }

}
