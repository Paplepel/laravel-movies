<?php

namespace App\Http\Controllers;

use App\Models\Screening;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Show;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Function to view all user tickets
    public function myTickets()
    {
        $tickets = Ticket::with('screening','user')
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('tickets', [
            "tickets" => $tickets
        ]);
    }

    // Function to generate ticket on screen for booking
    public function index($screening_id)
    {
        $screening = Screening::with('cinema', 'movie', 'room','slot')->find($screening_id);
        return view('ticket')
            ->with('screening', $screening);
    }

    // Function to book a ticket
    public function book(Request $request)
    {
        $request->validate([
            'screening_id' => 'required',
            'seats' => 'required',
        ]);
        // Remove seats from available seats
        $screening = Screening::find($request->screening_id);
        $screening->seats = $screening->seats - $request->seats;
        $screening->save();
        // Save Ticket to database
        $ticket = new Ticket();
        $ticket->screening_id = $request->screening_id;
        $ticket->seats = $request->seats;
        $ticket->user_id = Auth::user()->id;
        $ticket->save();
        return redirect('/tickets')->with('status', 'Ticket booked successfully');
    }
}
