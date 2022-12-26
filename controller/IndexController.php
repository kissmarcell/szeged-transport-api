<?php

class IndexController{
    public static function getIndex(): void
    {
        $error = array(
            "code" => 200,
            "severity" => "INFO",
            "message" => "For documentation, check out https://github.com/kissmarcell/szktapi",
        );
        include "view/error.php";
    }
}