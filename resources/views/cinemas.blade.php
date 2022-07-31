@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Cinemas for').' '.$movie->name }}</div>
                    <div class="card-body">
                        <img width="100%" src="/movieimage/{{ $movie->movie_banner }}">
                        <br>
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
                                    <th>Remove</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($cinemas as $cinema)
                                    <tr>
                                        <td>{{$cinema->name}}</td>
                                        <td>{{$cinema->location}}</td>
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

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                order: [[1, 'desc']],
            });
        });
    </script>
@endsection
