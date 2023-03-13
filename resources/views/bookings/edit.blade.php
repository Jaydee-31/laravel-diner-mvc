@extends('bookings.layout')

@section('content')
    <div class="container">
        <h1>Update Booking</h1>
        <hr>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('bookings.update', $booking->id) }}">
            @csrf
            @method('PUT')

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="name" value="{{ $booking->name }}">
                </div>
            </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="email" value="{{ $booking->email }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>phone:</strong>
                    <input type="text" name="phone" class="form-control" placeholder="phone" value="{{ $booking->phone }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>date:</strong>
                    <input type="date" name="date" class="form-control" placeholder="date" value="{{ $booking->date }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>time:</strong>
                    <input type="time" name="time" class="form-control" placeholder="time" value="{{ $booking->time }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>people:</strong>
                    <input type="number" name="people" class="form-control" placeholder="people" value="{{ $booking->people }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>message:</strong>
                    <input type="text" name="message" class="form-control" placeholder="message" value="{{ $booking->message }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
