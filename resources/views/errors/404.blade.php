@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="span12">
            <div class="jumbotron" style="text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;">
                <h1>Page Not Found <small><font face="Tahoma" color="red">Error 404</font></small></h1>
                <br />
                <p>The page you requested could not be found, either contact your webmaster or try again. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from</p>
                <p><b>Or you could just press this neat little button:</b></p>
                <a href="{{ route('home') }}" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Take Me Home</a>
            </div>
        </div>
    </div>
</div>

@endsection
