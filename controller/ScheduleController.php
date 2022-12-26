<?php
require "model/Event.php";
class ScheduleController
{

    public static function getSchedule($id, $arriving, $date, $time): void
    {
        if(!is_null($id)) {
            $schedule = Event::getSchedule($id, $arriving, $date, $time);
            require "view/schedule.php";
        }
        else {
            $error = array(
                "code" => 400,
                "severity" => "ERROR",
                "message" => "Station ID must be passed!",
            );
            require "view/error.php";
        }

    }
}