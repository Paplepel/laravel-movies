@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                @include('admin.components.nav')
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Edit Screening') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('posteditscreening') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Cinema') }}</label>
                                <div class="col-md-6">
                                    <select name="cinema_id" class="form-control" id="cinema_id">
                                        <option value="">Select Cinema</option>
                                        @foreach($cinemas as $cinema)
                                            <option @if($cinema->id == $screening->cinema_id) selected @endif value="{{$cinema->id}}">{{$cinema->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('cinema_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Rooms') }}</label>
                                <div class="col-md-6">
                                    <select name="room_id" class="form-control" id="room_id">
                                        <option value="">Select Room</option>
                                        @foreach($rooms as $room)
                                            <option @if($room->id == $screening->room_id) selected @endif value="{{$room->id}}">{{$room->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('room_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Movie') }}</label>
                                <div class="col-md-6">
                                    <select name="movie_id" class="form-control" id="movie_id">
                                        <option value="">Select Movie</option>
                                        @foreach($movies as $movie)
                                            <option @if($movie->id == $screening->movie_id) selected @endif value="{{$movie->id}}">{{$movie->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('movie_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Time Slot') }}</label>
                                <div class="col-md-6">
                                    <select name="slot_id" class="form-control" id="slot_id">
                                        <option value="">Select Time Slot</option>
                                        @foreach($slots as $slot)
                                            <option @if($slot->id == $screening->slot_id) selected @endif value="{{$slot->id}}">{{$slot->time}}</option>
                                        @endforeach
                                    </select>
                                    @error('slot_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Show Slot') }}</label>
                                <div class="col-md-6">
                                    <input type="date" name="show_date" value="{{ $screening->date }}" class="form-control" id="show_date">
                                    @error('show_date')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $screening->id }}">

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#cinema_id").change(function(){
                var cinema_id = $(this).val();
                console.log(cinema_id);
                if(cinema_id){
                    $.ajax({
                        type:'GET',
                        url:'{{ route("cinimaroom") }}',
                        data:{'id':cinema_id},
                        success:function(res){
                            $("#room_id").empty();
                            $("#room_id").append('<option>Select Room</option>');
                            $.each(res,function(key,value){
                                $("#room_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>

@endsection
