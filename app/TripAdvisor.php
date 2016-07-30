<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 24/7/2016
 * Time: 2:14 PM
 */

namespace App;


use Carbon\Carbon;

class TripAdvisor
{
    public function advise(Trip $trip)
    {
        $current_time = Carbon::now('Asia/Singapore');
        $advise = array();

        // Get bus stop arrival data
        $response = $this->callAPI('GET', 'http://datamall2.mytransport.sg/ltaodataservice/BusArrival', array("BusStopID" => $trip->start_position, "SST" => "True"));
        $result = json_decode($response);

        // Proccess data
        $buses = array_map('trim', explode(',', $trip->bus));
        foreach($result->Services as $s)
        {
            if(in_array($s->ServiceNo, $buses))
            {
                if ($s->NextBus->EstimatedArrival != '')
                {
                    $b1 = new Bus($s->ServiceNo, $s->NextBus->EstimatedArrival, $s->NextBus->Latitude, $s->NextBus->Longitude);
                    array_push($advise, $b1);
                }

                if ($s->SubsequentBus->EstimatedArrival != '')
                {
                    $b2 = new Bus($s->ServiceNo, $s->SubsequentBus->EstimatedArrival, $s->SubsequentBus->Latitude, $s->SubsequentBus->Longitude);
                    array_push($advise, $b2);
                }

                if ($s->SubsequentBus3->EstimatedArrival != '')
                {
                    $b3 = new Bus($s->ServiceNo, $s->SubsequentBus3->EstimatedArrival, $s->SubsequentBus3->Latitude, $s->SubsequentBus3->Longitude);
                    array_push($advise, $b3);
                }
            }
        }

        // Sort based on arrival time
        usort($advise, function($a, $b) {
            $ad = $a->arrival_time;
            $bd = $b->arrival_time;

            if ($ad->eq($bd)) {
                return 0;
            }

            return $ad->lt($bd) ? -1 : 1;
        });

        // Update bus status
        foreach ($advise as $a)
        {
            if ($a->arrival_time <= $current_time)
            {
                $a->status = 'Missed';
            }
            else if ($a->arrival_time <= $current_time->copy()->addMinute($trip->buffer_time))
            {
                $a->status = 'Unlikely';
            }
            else if ($a->arrival_time <= $current_time->copy()->addMinute($trip->buffer_time + 3))
            {
                $a->status = 'Recommended';
            }
            else
            {
                $a->status = 'Planned';
            }
        }

        return $advise;
    }

    private function callAPI($method, $url, $data = false)
    {
        $curl = curl_init();

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // Authentication Header
        $headers = array();
        $headers[] = 'AccountKey: ' . env('LTA_ACCOUNT_KEY');
        $headers[] = 'UniqueUserID: ' . env('LTA_UNIQUE_USER_ID');
        $headers[] = 'Accept: application/json';
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
}