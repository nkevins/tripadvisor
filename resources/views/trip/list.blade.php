@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>My Trip</h1>
            <a href="{{ route('createTrip') }}" class="btn btn-info" role="button"><span class="glyphicon glyphicon-plus"></span> Add Trip</a>

            <br />
            <br />
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Starting Bus Stop</th>
                    <th>Bus No</th>
                    <th>Action</th>
                </tr>
                @foreach($trips as $t)
                    <tr>
                        <td>{{ $t->name }}</td>
                        <td>{{ $t->start_position }}</td>
                        <td>{{ $t->bus }}</td>
                        <td>
                            <form action="{{ route('deleteTrip', $t->id) }}" method="post">
                                {{ csrf_field() }}
                                <a href="{{ route('editTrip', $t->id) }}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection