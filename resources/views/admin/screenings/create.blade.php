@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                @include('admin.components.nav')
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Add Screening') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('postscreening') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Cinema') }}</label>
                                <div class="col-md-6">
                                    <select name="cinema_id" class="form-control" id="cinema_id">
                                        <option value="">Select Cinema</option>
                                        @foreach($cinemas as $cinema)
                                            <option value="{{$cinema->id}}">{{$cinema->name}}</option>
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
                                        <option value="">Select Cinema</option>
                                    </select>
                                    @error('room_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


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
                                $("#room_id").append('<option value="'+value.room_id+'">'+value.name+'</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>

@endsection
