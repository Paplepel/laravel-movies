@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                @include('admin.components.nav')
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Screenings') }} <a href="{{ route('createcinema') }}" class="btn btn-primary text-right">Add Screening</a> </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Cinema</th>
                                <th>Location</th>
                                <th>Movie</th>
                                <th>Room</th>
                                <th>Time Slot</th>
                                <th>Seats</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($screenings as $screening)
                                <tr>
                                    <td>{{$screening->cinema->name}}</td>
                                    <td>{{$screening->cinema->location}}</td>
                                    <td>{{$screening->movie->name}}</td>
                                    <td>{{$screening->room->name}}</td>
                                    <td>{{$screening->slot}}</td>
                                    <td>{{$screening->seats}}</td>
                                    <td>
                                        <a href="editcinema/{{$screening->id}}" class="btn btn-primary">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a href="deletecinema/{{$screening->id}}" class="btn btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                order: [[3, 'desc']],
            });
        });
    </script>
@endsection
