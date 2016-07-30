<?php

namespace App\Http\Controllers;

use App\Trip;
use App\TripAdvisor;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::orderBy('name')->where('user_id', '=', Auth::user()->id)->get();

        return view('welcome', compact('trips'));
    }

    public function advisor($id)
    {
        $trip = Trip::find($id);

        if ($trip == null)
        {
            abort(404);
        }

        if ($trip->user_id != Auth::user()->id)
        {
            abort(403, 'Unauthorized action.');
        }

        $ta = new TripAdvisor();

        $advises = $ta->advise($trip);

        return view('advise', compact('trip', 'advises'));
    }

    public function list()
    {
        $trips = Trip::where('user_id', '=', Auth::user()->id)->orderBy('name')->get();

        return view('trip.list', compact('trips'));
    }

    public function create()
    {
        return view('trip.create');
    }

    public function save(Request $request)
    {
        $trip = new Trip();
        $trip->user_id = Auth::user()->id;
        $trip->name = $request->input('name');
        $trip->bus = $request->input('busNo');
        $trip->start_position = $request->input('busStop');
        $trip->buffer_time = $request->input('buffer');

        $trip->save();

        return redirect()->route('listTrip');
    }

    public function delete($id)
    {
        $trip = Trip::find($id);
        $trip->delete();

        return redirect()->route('listTrip');
    }

    public function edit($id)
    {
        $trip = Trip::find($id);
        if ($trip == null)
        {
            abort(404);
        }

        return view('trip.edit', compact('trip'));
    }

    public function saveEdit(Request $request)
    {
        $trip = Trip::find($request->input('tripId'));
        $trip->name = $request->input('name');
        $trip->bus = $request->input('busNo');
        $trip->start_position = $request->input('busStop');
        $trip->buffer_time = $request->input('buffer');

        $trip->save();

        return redirect()->route('listTrip');
    }
}
