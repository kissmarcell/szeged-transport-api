<?php
require "config/dbconnect.php";
require "model/Station.php";

class FindStationController
{
    public static function getStation($id, $name): void
    {
        global $pdo;
        if(!is_null($id) && !is_null($name)){
            $error = array(
                "code" => 400,
                "severity" => "ERROR",
                "message" => "Only ID 'or' name can be passed at a time!",
            );
            require "view/error.php";
            return;
        }
        if(!is_null($id)){
            $stations = Station::getStationByID($pdo, $id);
        }
        else if(!is_null($name)){
            $stations = Station::getStationsByName($pdo, $name);
        }
        else{
            $error = array(
                "code" => 400,
                "severity" => "ERROR",
                "message" => "Either station ID or name must be passed!",
            );
            require "view/error.php";
            return;
        }
        require "view/findstation.php";
    }
}