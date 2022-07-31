<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;

class CinemaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // function to redirect to view all cinemas
    public function index()
    {
        return view('admin.cinemas.index', [
            'cinemas' => Cinema::all()
        ]);
    }

    // function to delete cinema
    public function deletecinema($id)
    {
        $cinema = Cinema::find($id);
        $cinema->delete();
        return redirect('/cinemas');
    }

    // function to create cinema
    public function create()
    {
        return view('admin.cinemas.create');
    }

    // function to add cinema
    public function postcinema()
    {
        $attributes = request()->validate([
            'name' => 'required|min:5|max:60||regex:/^[\pL\s]+$/u',
            'location' => 'required|min:5|max:60||regex:/^[\pL\s]+$/u',
        ]);
        $newcinema = Cinema::create($attributes);
        return redirect('/cinemas')->with('status', 'Cinema added successfully');
    }

    // function to view edit page
    public function editcinema($id)
    {
        $editCinema = Cinema::find($id);
        return view('admin.cinemas.edit', [
            'cinema' => $editCinema
        ]);
    }

    // function to update cinema
    public function posteditcinema(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:5|max:60||regex:/^[\pL\s]+$/u',
            'location' => 'required|min:5|max:60||regex:/^[\pL\s]+$/u',
        ]);
        $cinema = Cinema::find($request['id']);
        $cinema->update($attributes);
        return redirect('/cinemas')->with('status', 'Cinema updated successfully');
    }

}
