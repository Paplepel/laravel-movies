<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            'name' => 'required',
            'movie_banner' => 'image|mimes:jpg,jpeg,gif,png',
            'movie_poster' => 'image|mimes:jpg,jpeg,gif,png'
        ]);
        $movie_banner = file($request['movie_banner']);
        $movie_poster = file($request['movie_poster']);
        $banner_name = rand(10000,99999).'.'.$request['movie_banner']->extension();
        $poster_name = rand(10000,99999).'.'.$request['movie_poster']->extension();
        $request['movie_banner']->move(public_path('movieimage'),$banner_name);
        $request['movie_poster']->move(public_path('movieimage'),$poster_name);
        $movie = new Movie();
        $movie->name = $request['name'];
        $movie->movie_poster = $poster_name;
        $movie->movie_banner = $banner_name;
        $movie->save();
        return redirect('movies')
            ->with('status', 'Movie added successfully');
    }

    //function to delete movie record from the database
    public function deletemovie($id) {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect('movies')
            ->with('status', 'Movie deleted successfully');
    }

    //function to redirect to edit movie page
    public function editmovie($id) {
        $movie = Movie::find($id);
        return view('admin.movies.edit', [
            'movie' => $movie
        ]);
    }

    // function to update movie record in the database
    public function posteditmovie(Request $request) {
        $request->validate([
            'name' => 'required',
            'movie_banner' => 'image|mimes:jpg,jpeg,gif,png',
            'movie_poster' => 'image|mimes:jpg,jpeg,gif,png'
        ]);
        $movie = Movie::find($request['id']);
        $movie_banner = file($request['movie_banner']);
        $movie_poster = file($request['movie_poster']);
        $banner_name = rand(10000,99999).'.'.$request['movie_banner']->extension();
        $poster_name = rand(10000,99999).'.'.$request['movie_poster']->extension();
        $request['movie_banner']->move(public_path('movieimage'),$banner_name);
        $request['movie_poster']->move(public_path('movieimage'),$poster_name);
        $movie->name = $request['name'];
        $movie->movie_poster = $poster_name;
        $movie->movie_banner = $banner_name;
        $movie->save();
        return redirect('movies')
            ->with('status', 'Movie updated successfully');
    }

}
