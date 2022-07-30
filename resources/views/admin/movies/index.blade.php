@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                @include('admin.components.nav')
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Movies') }} <a href="{{ route('createmovie') }}" class="btn btn-primary text-right">Add Movie</a> </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($movies as $movie)
                                <tr>
                                    <td><img src="{{$movie->movie_banner}}" width="200px"></td>
                                    <td>{{$movie->name}}</td>
                                    <td>{{$movie->created_at}}</td>
                                    <td>{{$movie->updated_at}}</td>
                                    <td>
                                        <a href="editcinema/{{$movie->id}}" class="btn btn-primary">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a href="deletecinema/{{$movie->id}}" class="btn btn-danger">
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
