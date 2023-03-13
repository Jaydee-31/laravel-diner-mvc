@extends('bookings.layout')

@section('content')
<div class="container">
    <div class="row">
        <h1>Admin</h1>
        <hr>
        <div class="row">
                <div class="pull-left">
                    <a class="btn btn-show" href="{{ route('home.index') }}">Go Back</a>
                </div>
                <div class="pull-left">
                    <a class="btn btn-success" href="{{ route('bookings.create') }}"> Add New Booking</a>
                </div>
        </div><br>
    </div>
    
    <div class="row">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if($bookings->isEmpty())
            <p>No bookings found.</p>
            @else
                <table class="table table-bordered styled-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>People</th>
                            <th>Message</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->name }}</td>
                                <td>{{ $booking->email }}</td>
                                <td>{{ $booking->phone }}</td>
                                <td>{{ $booking->date}}</td>
                                <td>{{ $booking->time }}</td>
                                <td>{{ $booking->people }}</td>
                                <td>{{ $booking->message }}</td>
                                
                                <td>
                                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('bookings.edit', $booking->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $bookings->links() }}
        @endif
    </div>
</div>
@endsection