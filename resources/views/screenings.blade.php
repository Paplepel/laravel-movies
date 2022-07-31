@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Screenings for ').$movie->name.' at '. $cinema->name . ' By Date'}}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dateSearch') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('T0 Date') }}</label>

                                <div class="col-md-6">
                                    <input id="to_date" type="date" class="form-control @error('to_date') is-invalid @enderror" name="to_date" value="{{ $to_date ?? ''}}" required>

                                    @error('to_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                            <input type="hidden" name="cinema_id" value="{{ $cinema->id }}">

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Search') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">{{ __('Screenings for ').$movie->name.' at '. $cinema->name}}</div>
                    <div class="card-body">
                        <img width="100%" src="/movieimage/{{ $movie->movie_banner }}" onerror="this.src='/placeholder/banner.png'">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Cinema</th>
                                    <th>Location</th>
                                    <th>Movie</th>
                                    <th>Room</th>
                                    <th>Date</th>
                                    <th>Time Slot</th>
                                    <th>Seats Available</th>
                                    <th>Book Now</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($screenings as $screening)
                                    <tr>
                                        <td>{{$screening->cinema->name}}</td>
                                        <td>{{$screening->cinema->location}}</td>
                                        <td>{{$screening->movie->name}}</td>
                                        <td>{{$screening->room->name}}</td>
                                        <td>{{$screening->date}}</td>
                                        <td>{{$screening->slot->time}}</td>
                                        <td>{{$screening->seats}}</td>
                                        @if($screening->seats > 0)
                                            <td><a href="{{ route('ticket', ['screening_id' => $screening->id]) }}" class="btn btn-primary">Book Now</a></td>
                                        @else
                                            <td>Sold Out</td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tfoot>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                order: [[1, 'desc']],
            });
        });
    </script>
@endsection
