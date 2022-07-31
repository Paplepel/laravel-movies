@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Tickets for').' '. Auth::User()->name }}</div>
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
                                <th>Movie</th>
                                <th>Cinema</th>
                                <th>Room</th>
                                <th>No Seats</th>
                                <th>Date</th>
                                <th>Time Slot</th>
                                <th>Status</th>
                                <th>Cancel</th>
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->user->name }}</td>
                                    <td>{{ $ticket->screening->movie->name }}</td>
                                    <td>{{ $ticket->screening->cinema->name}}</td>
                                    <td>{{ $ticket->screening->room->name }}</td>
                                    <td>{{ $ticket->seats }}</td>
                                    <td>{{ $ticket->screening->date}}</td>
                                    <td>{{ $ticket->screening->slot->time}}</td>
                                    @if($ticket->screening->date < now()->format('Y-m-d'))
                                        <td><font color="#808080">Expired</font></td>
                                    @else
                                        @if($ticket->status == 'Active')
                                            <td><font color="green">Active</font></td>
                                            @else
                                            <td><font color="red">Cancelled</font></td>
                                        @endif
                                    @endif
                                    <td>
                                        <a href="" class="btn btn-danger">
                                            Cancel
                                        </a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-danger">
                                            View
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
                    order: [[5, 'desc']],
                });
            });
        </script>
@endsection
