@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Ticker for ').$screening->movie->name.' at '. $screening->cinema->name }}</div>
                    <div class="card-body">
                        <!-- Portfolio Item Row -->
                        <div class="row">

                            <div class="col-md-2">
                                <img class="img-fluid" src="/movieimage/{{ $screening->movie->movie_poster }}" alt="">
                            </div>

                            <div class="col-md-4">
                                <h3 class="my-3">{{ $screening->movie->name }}</h3>
                                <h3 class="my-3">Ticket Details</h3>
                                <ul>
                                    <li>Location    : {{ $screening->cinema->name }}</li>
                                    <li>Cine        : {{ $screening->room->name }}</li>
                                    <li>Date        : {{ $screening->date }}</li>
                                    <li>Time        : {{ $screening->slot->time }}</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <form method="POST" action="{{ route('book') }}">
                                @csrf
                                <input id="seats" type="number" class="form-control @error('seats') is-invalid @enderror" name="seats" value="{{ old('seats')}}" required>

                                @error('seats')
                                <strong>{{ $message }}</strong>
                            @enderror
                                <input type="hidden" name="screening_id" value="{{ $screening->id }}">
                                    <br>
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Confirm Booking') }}
                                </button>
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
