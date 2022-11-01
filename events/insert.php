<?php

$mysqli = require __DIR__ . "/../database.php";

$name = $_POST["name"];
$date = $_POST["date"];
$event_type = filter_input(INPUT_POST, "event_type", FILTER_VALIDATE_INT);

if(!empty($name) || !empty($date) || !empty($event_type)){
$sql = "INSERT INTO evento (nombre, fecha, tipo_evento_id) VALUES ('$name', '$date', $event_type)";
$mysqli->query($sql);
$result = mysqli_insert_id($mysqli);
header("Location: detail.php?id=" . $result);
}

?>