@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>Create Trip</h1>
            <form action="{{ route('saveTrip') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="busStop">Starting Bus Stop</label>
                    <input type="text" class="form-control" id="busStop" name="busStop" placeholder="Bus Stop" required>
                </div>
                <div class="form-group">
                    <label for="busNo">Bus No</label>
                    <input type="text" class="form-control" id="busNo" name="busNo" placeholder="Bus No" required>
                    <p class="help-block">To enter multiple no separate it with comma (e.g. 121,122,91)</p>
                </div>
                <div class="form-group">
                    <label for="buffer">Additional Buffer Time</label>
                    <input type="number" class="form-control" id="buffer" name="buffer" placeholder="Buffer Time" required value="0" min="0">
                    <p class="help-block">Enter the additional amount of time in minutes for you to reach the bus stop</p>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection