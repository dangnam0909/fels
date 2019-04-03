<?php

use Illuminate\Support\Carbon;

if (! function_exists('time_human')) {
    function time_human($key, $default = null) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $key)->diffForHumans();
    }
}
