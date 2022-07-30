@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                @include('admin.components.nav')
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ $cinema->name }} <a href="{{ route('createroom',['id' => $cinema->id]) }}" class="btn btn-primary text-right">Add Rooms</a> </div>

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
                                <th>Name</th>
                                <th>No. Seats</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($rooms as $room)
                                <tr>
                                    <td>{{$room->name}}</td>
                                    <td>{{$room->name}}</td>
                                    <td>{{$room->seats}}</td>
                                    <td>
                                        <a href="{{ route('editroom',['id' => $cinema->id, 'idroom' => $room->id]) }}" class="btn btn-primary">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('deleteroom',['id' => $cinema->id, 'idroom' => $room->id]) }}" class="btn btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
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
