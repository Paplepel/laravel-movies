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

    //Function to view a ticket
    public function viewTicket($id)
    {
        $ticket = Ticket::with('screening','user')
            ->where('id', $id)
            ->first();
        return view('viewticket', [
            "ticket" => $ticket
        ]);
    }

    //Function to cancel a ticket
    public function cancel($id)
    {
        $ticket = Ticket::find($id);
        $sceening = Screening::find($ticket->screening_id);
        $sceening->seats = $sceening->seats + $ticket->seats;
        $sceening->save();
        $ticket->status = "Cancelled";
        $ticket->save();
        return redirect('/tickets')->with('status', 'Ticket cancelled successfully');
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
        $ticket->ticket_number = $this->randomString(10);
        $ticket->screening_id = $request->screening_id;
        $ticket->seats = $request->seats;
        $ticket->user_id = Auth::user()->id;
        $ticket->save();
        return redirect('/tickets')->with('status', 'Ticket booked successfully');
    }

    // Function to resturn random string of characters
    public function randomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
