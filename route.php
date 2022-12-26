<?php

// Get the path from the url, if it doesn't exist, default to index
$path = $_GET["path"] ?? "index";

// Switch based on path
switch ($path) {
    case "findstation":
        require "controller/FindStationController.php";
        FindStationController::getStation(
            $_GET["id"] ?? null,
            $_GET["name"] ?? null
        );
        break;
    case "schedule":
        require "controller/ScheduleController.php";
        ScheduleController::getSchedule(
            $_GET["id"] ?? null,
            $_GET["arriving"] ?? false,
            $_GET["date"] ?? date("Y-m-d", time()),
            $_GET["time"] ?? date("H:i:s", time())
        );
        break;
    default:
        require "controller/IndexController.php";
        IndexController::getIndex();
        break;
}
