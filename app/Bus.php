<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 24/7/2016
 * Time: 2:12 PM
 */

namespace App;


use Carbon\Carbon;

class Bus
{
    public $no;
    public $arrival_time;
    public $lat;
    public $lon;
    public $load;
    public $status;

    function __construct($no, $arrival_time, $lat, $lon, $load)
    {
        $this->no = $no;
        $this->arrival_time = Carbon::parse($arrival_time);
        $this->lat = $lat;
        $this->lon = $lon;
        $this->load = $load;
    }
}