@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Screenings for ').$movie->name.' at '. $cinema->name}}</div>
                    <div class="card-body">
                        <img width="100%" src="/movieimage/{{ $movie->movie_banner }}">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Cinema</th>
                                    <th>Location</th>
                                    <th>Movie</th>
                                    <th>Room</th>
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
                                        <td>{{$screening->slot->time}}</td>
                                        <td>{{$screening->seats}}</td>
                                        <td>
                                            <a href="{{ route('editscreening',['id' => $screening->id]) }}" class="btn btn-primary">
                                                Book Now
                                            </a>
                                        </td>
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
