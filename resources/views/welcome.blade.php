@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Movies') }}</div>
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
                                <th>Movie</th>
                                <th>Book</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($movies as $movie)
                                <tr>
                                    <td width="10%"><img src="/movieimage/{{$movie->movie_poster}}" onerror="this.src='/placeholder/poster.png'" width="100px"></td>
                                    <td width="80%">{{$movie->name}}<br>
                                    </td>
                                    <td width="10%">
                                        <a href="{{ route('moviecinemas',['movie_id' => $movie->id]) }}" class="btn btn-danger">
                                            Book
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
                order: [[1, 'desc']],
            });
        });
    </script>
@endsection
