<?php

namespace App\Helpers;

use Carbon\Carbon;

class Help
{
    public static function parse_date($date){
        return Carbon::parse($date)->format('M d, Y - h:i A');
    }
}
