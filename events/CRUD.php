<?php

function select_info($table, $fild, $comparison)
{
    $mysqli = require __DIR__ . "/../database.php";

    $sql = sprintf("SELECT * FROM $table WHERE $fild = '%s'"
    , $mysqli->real_escape_string($comparison));

    return $mysqli->query($sql);

}

function select_all_info($table)
{
    $mysqli = require __DIR__ . "/../database.php";

    $sql = sprintf("SELECT * FROM $table");

    return $mysqli->query($sql);
 
}

function inner_join($table1, $table2, $fild1, $fild2){

    $mysqli = require __DIR__ . "/../database.php";

    $sql = sprintf("SELECT * FROM $table1 INNER JOIN $table2 on $table1.$fild1 = $table2.$fild2");

    return $mysqli->query($sql);

}

function delete_event($id){
    $mysqli = require __DIR__ . "/../database.php";

    $sql = sprintf("DELETE FROM evento WHERE id = '%s'"
    , $mysqli->real_escape_string($id));

    $mysqli->query($sql);

}