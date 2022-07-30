<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function index()
    {
        return view('admin.cinemas');
    }
}
