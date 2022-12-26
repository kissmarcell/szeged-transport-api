<?php
require "view/header.php";
http_response_code($error["code"]);
print json_encode($error);