@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Ticker for ').$ticket->screening->movie->name.' at '. $ticket->screening->cinema->name }}</div>
                    <div class="card-body">
                        <!-- Portfolio Item Row -->
                        <div class="row">

                            <div class="col-md-2">
                                <img class="img-fluid" src="/movieimage/{{ $ticket->screening->movie->movie_poster }}" alt="">
                            </div>

                            <div class="col-md-4">
                                <h3 class="my-3">{{ $ticket->screening->movie->name }}</h3>
                                <h3 class="my-3">Ticket Details</h3>
                                <ul>
                                    <li>Location    : {{  $ticket->screening->cinema->name }}</li>
                                    <li>Cine        : {{  $ticket->screening->room->name }}</li>
                                    <li>Date        : {{  $ticket->screening->date }}</li>
                                    <li>Time        : {{  $ticket->screening->slot->time }}</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h3 class="my-3">Number of Seats</h3>
                                    <input id="seats" type="number" class="form-control" name="seats" value="{{  $ticket->seats  }}" disabled>
                                <br>
                                <a class="btn btn-primary" href="{{ route('mytickets') }}">
                                    {{ __('Back to my tickets') }}
                                </a>
                                </form>
                            </div>

                        </div>

                        <!-- /.row -->

                        <!-- Related Projects Row -->
                    </div>
                </div>
            </div>
        </div>

@endsection
