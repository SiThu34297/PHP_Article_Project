<?php 
namespace Helpers;

use DateTime;
date_default_timezone_set("Asia/Yangon");

class Time 
{
    
     static function diffForHumans(DateTime $date)
     {
        $currentDate = new DateTime();
        
        $difference = $currentDate->diff($date);

        $unit = 'second';

        $count = $difference->s;

        switch (true)
        {
            case $difference->y > 0 :
                $unit = "year";
                $count = $difference->y;
                break;
            case $difference->m > 0 :
                $unit = "month";
                $count = $difference->m;
                break;
            case $difference->d > 0 :
                $unit = "day";
                $count = $difference->d;
                break;
            case $difference->h > 0 :
                $unit = "hour";
                $count = $difference->h;
                break;
            case $difference->i > 0 :
                $unit = "minute";
                $count = $difference->i;
                break;     
        }
        if($count === 0)
        {
            $count = 1;
        }
        if($count !== 1)
        {
            $unit .= 's';
        }

        return "{$count} {$unit} ago";
     }
}