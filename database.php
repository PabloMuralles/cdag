<?php

$host = "localhost";
$port = 8888;
$dbname = "cdag";
$username = "root";
$password = "root";

$mysqli = new mysqli($host, $username,$password, $dbname, $port);

if ($mysqli->connect_errno)
{
    die("Connection error: " . $mysqli->connect_errno);
}

return $mysqli;
