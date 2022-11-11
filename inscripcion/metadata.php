<?php

namespace inscripcion;

class metadata
{
    public $mysqli;

    function __construct()
    {
        $this->mysqli = require __DIR__ . "/../database.php";
    }

    function getCatalog($query)
    {
        $resultQuery = $this->mysqli->query($query);
        $result = [];
        if ($resultQuery->num_rows > 0) {
            while ($row = $resultQuery->fetch_assoc()) {
                $result += [$row["id"] => $row["nombre"]];
            }
        }
        $resultQuery->close();
        return $result;
    }

    public function getObjeto($query)
    {
        $resultQuery = $this->mysqli->query($query);
        $row = null;
        if ($resultQuery->num_rows > 0) {
            $row = $resultQuery->fetch_assoc();
        }
        $resultQuery->close();
        return $row;
    }

    public function getDepartamento()
    {
        $query = ('
            SELECT d.*
            FROM departamento AS d;
        ');
        return $this->getCatalog($query);
    }

    public function getFadn_deporte()
    {
        $query = ('
            SELECT f.*
            FROM fadn_deporte AS f;
        ');
        return $this->getCatalog($query);
    }

    public function getGrupo_objetivo()
    {
        $query = ('
            SELECT g.*
            FROM grupo_objetivo AS g;
        ');
        return $this->getCatalog($query);
    }

    public function getIdentidad_cultural()
    {
        $query = ('
            SELECT i.*
            FROM identidad_cultural AS i;
        ');
        return $this->getCatalog($query);
    }

    public function getInstitucion()
    {
        $query = ('
            SELECT i.*
            FROM institucion AS i;
        ');
        return $this->getCatalog($query);
    }

    public function getEscolaridad()
    {
        $query = ('
            SELECT e.*
            FROM escolaridad AS e;
        ');
        return $this->getCatalog($query);
    }

    public function getMunicipio()
    {
        $query = ('
            SELECT m.*
            FROM municipio AS m;
        ');
        return $this->getCatalog($query);
    }

    public function getEvento($evento_id)
    {
        $query = "SELECT e.id as id, e.nombre as nombre_evento, te.nombre as tipo_evento, e.fecha as fecha
        FROM evento e inner join tipo_evento te on e.tipo_evento_id = te.id WHERE e.id = {$evento_id}";
        return $this->getObjeto($query);
    }

    public function getParticipante($idPersona)
    {
        $query = "SELECT * FROM participante p WHERE p.dpi_cui = {$idPersona}";
        return $this->getObjeto($query);
    }

    public function getRegistro($participanteId, $eventoId)
    {
        $query = "SELECT * FROM registro_evento WHERE participante_id = {$participanteId} and evento_id = {$eventoId}";
        return $this->getObjeto($query);
    }

    public function setInscripcion($participanteId, $eventoId)
    {
        $query = "INSERT INTO registro_evento (participante_id, evento_id) VALUES ('$participanteId', $eventoId)";
        $this->mysqli->query($query);
        return mysqli_insert_id($this->mysqli);
    }
}
