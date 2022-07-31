<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;
use App\Models\Room;

class RoomController extends Controller
{
    // function to redirect to view all room for a cinema
    public function index($id) {
        $rooms = Room::where('cinema_id', $id)->get();
        return view('admin.rooms.index', [
            'cinema' => Cinema::find($id),
            'rooms' => $rooms,
            'id' => $id
        ]);
    }

    // function to create room for a cinema
    public function create($id) {
        return view('admin.rooms.create', [
            'cinema' => Cinema::find($id),
            'id' => $id
        ]);
    }

    // function to store room for a cinema
    public function postroom(Request $request,$id) {
        $request->validate([
            'name' => 'required',
            'seats' => 'required|numeric|min:1|max:255'
        ]);
        $room = new Room();
        $room->name = $request->name;
        $room->seats = $request->seats;
        $room->cinema_id = $id;
        $room->save();
        return redirect('cinema/'.$id.'/rooms')
            ->with('status', 'Room created successfully');
    }

    // function to delete room for a cinema
    public function deleteroom ($id,$idroom) {
        $room = Room::find($idroom);
        $room->delete();
        return redirect('cinema/'.$id.'/rooms')
            ->with('status', 'Room deleted successfully');
    }

    // function to edit room for a cinema
    public function editroom ($id,$idroom) {
        $room = Room::find($idroom);
        return view('admin.rooms.edit', [
            'room' => $room,
            'id' => $id
        ]);
    }

    // function to update room for a cinema
    public function posteditroom (Request $request,$id,$idroom) {
        $request->validate([
            'name' => 'required',
            'seats' => 'required|numeric|min:1|max:255'
        ]);
        $room = Room::find($idroom);
        $room->name = $request->name;
        $room->seats = $request->seats;
        $room->save();
        return redirect('cinema/'.$id.'/rooms')
            ->with('status', 'Room updated successfully');
    }

}
