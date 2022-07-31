<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;
use App\Models\Screening;
use App\Models\Room;
use App\Models\Movie;
use App\Models\Slot;

class ScreeningController extends Controller
{
    // function to get all screenings and return view
    public function index() {
        $screenings = Screening::with('cinema', 'movie', 'room','slot')->get();

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
        $slots = Slot::all();

        return view('admin.screenings.create', [
            'cinemas' => $cinemas,
            'movies' => $movies,
            'rooms' => $rooms,
            'slots' => $slots
        ]);
    }

    // Function to add screening to database
    public function postscreening(Request $request) {
        //dd($request);
        $request->validate([
            'cinema_id' => 'required',
            'movie_id' => 'required',
            'room_id' => 'required',
            'slot_id' => 'required',
            'show_date' => 'required',
        ]);
        $room = Room::find($request->room_id);
        $screening = new Screening();
        $screening->cinema_id = $request->cinema_id;
        $screening->movie_id = $request->movie_id;
        $screening->room_id = $request->room_id;
        $screening->slot_id = $request->slot_id;
        $screening->date = $request->show_date;
        $screening->seats = $room->seats;
        $screening->save();
        return redirect('/screenings')->with('status', 'Screening added successfully');
    }

    // Function to delete screening from database
    public function deletescreening($id) {
        $screening = Screening::find($id);
        $screening->delete();
        return redirect('/screenings')->with('status', 'Screening deleted successfully');
    }

    // Function to show view for edit screening
    public function editscreening($id) {
        $screening = Screening::find($id);
        $cinemas = Cinema::all();
        $movies = Movie::all();
        $rooms = Room::Where('cinema_id', $screening->cinema_id)->get();
        $slots = Slot::all();

        return view('admin.screenings.edit', [
            'screening' => $screening,
            'cinemas' => $cinemas,
            'movies' => $movies,
            'rooms' => $rooms,
            'slots' => $slots
        ]);
    }

    // Function to update screening in database
    public function posteditscreening (Request $request) {
        $screening = Screening::find($request['id']);
        $request->validate([
            'cinema_id' => 'required',
            'movie_id' => 'required',
            'room_id' => 'required',
            'slot_id' => 'required',
            'show_date' => 'required',
        ]);
        $room = Room::find($request->room_id);
        $screening->cinema_id = $request->cinema_id;
        $screening->movie_id = $request->movie_id;
        $screening->room_id = $request->room_id;
        $screening->slot_id = $request->slot_id;
        $screening->date = $request->show_date;
        $screening->seats = $room->seats;
        $screening->save();
        return redirect('/screenings')->with('status', 'Screening updated successfully');
    }
}
