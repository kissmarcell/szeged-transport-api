<?php

$host = "";
$username = "";
$password = "";
$dbname = "";

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
$pdo = new PDO($dsn, $username, $password);