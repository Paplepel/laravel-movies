@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                @include('admin.components.nav')
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Cinemas') }} <a href="{{ route('createcinema') }}" class="btn btn-primary text-right">Add Cinema</a> </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Manage Rooms</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($cinemas as $cinema)
                                <tr>
                                    <td>{{$cinema->name}}</td>
                                    <td>{{$cinema->location}}</td>
                                    <td>{{$cinema->created_at}}</td>
                                    <td>{{$cinema->updated_at}}</td>
                                    <td>Rooms</td>
                                    <td>
                                        <a href="editcinema/{{$cinema->id}}" class="btn btn-primary">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a href="deletecinema/{{$cinema->id}}" class="btn btn-danger">
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
