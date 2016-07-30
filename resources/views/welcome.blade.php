@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Select Your Trip</h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                @if($trips->count() == 0)
                    <h4 class="text-center">Start defining your trip <a href="{{ route('createTrip') }}">here</a></h4>
                @else
                    <div class="list-group">
                        @foreach($trips as $t)
                            <a href="{{ route('tripadvisor', ['id' => $t->id]) }}" class="list-group-item">{{ $t->name }}</a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

    </div>

@endsection