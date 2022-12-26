<?php
require "view/header.php";
print json_encode($schedule, JSON_UNESCAPED_UNICODE );