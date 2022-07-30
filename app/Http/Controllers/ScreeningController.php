<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;
use App\Models\Screening;

class ScreeningController extends Controller
{
    // function to get all screenings and return view
    public function index() {
        $screenings = Screening::with('cinema', 'movie', 'room')->get();

        return view('admin.screenings.index')
            ->with('screenings', $screenings);
    }
}
