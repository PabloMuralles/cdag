<?php

namespace inscripcion;

class metadata
{
    function connectDB($sql)
    {
        $mysqli = require "../database.php";
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

    public function getDepartamento()
    {
        $query = ('
            SELECT d.*
            FROM departamento AS d;
        ');
        return $this->getCatalog($this->connectDB($query));
    }

    public function getFadn_deporte()
    {
        $query = ('
            SELECT f.*
            FROM fadn_deporte AS f;
        ');
        return $this->getCatalog($this->connectDB($query));
    }

    public function getGrupo_objetivo()
    {
        $query = ('
            SELECT g.*
            FROM grupo_objetivo AS g;
        ');
        return $this->getCatalog($this->connectDB($query));
    }

    public function getIdentidad_cultural()
    {
        $query = ('
            SELECT i.*
            FROM identidad_cultural AS i;
        ');
        return $this->getCatalog($this->connectDB($query));
    }

    public function getInstitucion()
    {
        $query = ('
            SELECT i.*
            FROM institucion AS i;
        ');
        return $this->getCatalog($this->connectDB($query));
    }

    public function getEscolaridad()
    {
        $query = ('
            SELECT e.*
            FROM escolaridad AS e;
        ');
        return $this->getCatalog($this->connectDB($query));
    }

    public function getMunicipio()
    {
        $query = ('
            SELECT m.*
            FROM municipio AS m;
        ');
        return $this->getCatalog($this->connectDB($query));
    }

    public function getEvento($evento_id)
    {
        $query = "SELECT e.id as id, e.nombre as nombre_evento, te.nombre as tipo_evento, e.fecha as fecha
        FROM evento e inner join tipo_evento te on e.tipo_evento_id = te.id WHERE e.id = {$evento_id}";
        $resultQuery = $this->connectDB($query);
        $row = null;
        if ($resultQuery->num_rows > 0) {
            $row = $resultQuery->fetch_assoc();
        }
        $resultQuery->close();
        return $row;
    }
}
