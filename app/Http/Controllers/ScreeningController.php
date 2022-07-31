<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;
use App\Models\Screening;
use App\Models\Room;
use App\Models\Movie;

class ScreeningController extends Controller
{
    // function to get all screenings and return view
    public function index() {
        $screenings = Screening::with('cinema', 'movie', 'room')->get();

        return view('admin.screenings.index')
            ->with('screenings', $screenings);
    }

    // function to get room based on cinema id and return data for ajax call
    public function getRoom(Request $request) {
        $data = Room::where("cinema_id", $request['id'])->get();
        return response()->json($data);
    }

    // function to return view to add screening
    public function create() {
        $cinemas = Cinema::all();
        $movies = Movie::all();
        $rooms = Room::all();

        return view('admin.screenings.create', [
            'cinemas' => $cinemas,
            'movies' => $movies,
            'rooms' => $rooms
        ]);
    }
}
