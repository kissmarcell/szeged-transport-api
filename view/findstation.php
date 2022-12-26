<?php
require "view/header.php";
print json_encode($stations, JSON_UNESCAPED_UNICODE);