@extends('layouts.master')

@section('content')
<?php
    $now = \Carbon\Carbon::now('Asia/Singapore');
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Trip: {{ $trip->name }}</h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <table class="table">
                    <tr>
                        <th>Bus</th>
                        <th>Arrival Time</th>
                        <th>Diff</th>
                        <th>Status</th>
                    </tr>
                    @foreach($advises as $a)
                        <?php
                            if ($a->status == 'Missed')
                            {
                                $status = 'active';
                            }
                            else if ($a->status == 'Recommended')
                            {
                                $status = 'success';
                            }
                            else if ($a->status == 'Unlikely')
                            {
                                $status = 'danger';
                            }
                            else
                            {
                                $status = '';
                            }
                        ?>
                        <tr class="{{ $status }}">
                            <td>{{ $a->no }}</td>
                            <td>{{ $a->arrival_time }}</td>
                            <td>{{ $now->diffInMinutes($a->arrival_time, false) }}</td>
                            <td>{{ $a->status }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="row" style="display: none;">
            <div id="map" style="height: 300px;"></div>

            <script>

                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 14,
                        center: {lat: 1.2746211666666667, lng: 103.80192016666666}
                    });

                    <?php $i = 0; ?>
                    @foreach($advises as $a)
                        var marker{{$i}} = new google.maps.Marker({
                                position: {lat: {{$a->lat}}, lng: {{$a->lon}}},
                                map: map,
                                title: '{{$a->no}}'
                        });
                        <?php $i++; ?>
                    @endforeach

                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUIvTTFU6gvd9RZOELUdD065aOKAlWgXM&callback=initMap"
                    async defer></script>
        </div>

    </div>

@endsection

@section('script')
    <script type="text/javascript">
        setTimeout(function () {
            location.reload();
        }, 60 * 1000);
    </script>
@endsection