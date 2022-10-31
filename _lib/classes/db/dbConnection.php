<?php

namespace db;

class dbConnection
{
    function connectDB($sql)
    {
        $mysqli = require "database.php";
        return $mysqli->query($sql);
    }

    function getCatalog($resultQuery)
    {
        $result = [];
        if ($resultQuery->num_rows > 0) {
            while ($row = $resultQuery->fetch_assoc()) {
                $result += [$row["id"] => $row["nombre"]];
            }
        }
        $resultQuery->close();
        return $result;
    }

    public function getEscolaridad()
    {
        $query = ('
            SELECT e.*
            FROM escolaridad AS e;
        ');
        return $this->getCatalog($this->connectDB($query));
    }
}
