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
        if ($resultQuery && $resultQuery->num_rows > 0) {
            while ($row = $resultQuery->fetch_assoc()) {
                $result += [$row["id"] => $row["nombre"]];
            }
        }
        return $result;
    }

    public function getObjeto($query)
    {
        $resultQuery = $this->mysqli->query($query);
        $row = null;
        if ($resultQuery && $resultQuery->num_rows > 0) {
            $row = $resultQuery->fetch_assoc();
        }
        return $row;
    }

    public function getId($query)
    {
        $resultQuery = $this->mysqli->query($query);
        $row = null;
        if ($resultQuery && $resultQuery->num_rows > 0) {
            $row = $resultQuery->fetch_assoc();
        }
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
        FROM evento e inner join tipo_evento te on e.tipo_evento_id = te.id WHERE e.id = $evento_id";
        return $this->getObjeto($query);
    }

    public function getParticipante($idPersona)
    {
        $query = "SELECT * FROM participante p WHERE p.dpi_cui = $idPersona";
        return $this->getObjeto($query);
    }

    public function getRegistro($participanteId, $eventoId)
    {
        $query = "SELECT * FROM registro_evento WHERE participante_id = $participanteId and evento_id = $eventoId";
        return $this->getObjeto($query);
    }

    public function getDepartamentoId($nombre)
    {
        $query = ('
            SELECT d.id
            FROM departamento AS d WHERE d.nombre = $nombre;
        ');
        return $this->getCatalog($query);
    }

    public function getFadnId($nombre)
    {
        $query = ('
            SELECT f.id
            FROM fadn_deporte AS f WHERE f.nombre = $nombre;
        ');
        return $this->getCatalog($query);
    }

    public function getGrupoObjetivoId($nombre)
    {
        $query = ('
            SELECT g.id
            FROM grupo_objetivo AS g WHERE g.nombre = $nombre;
        ');
        return $this->getCatalog($query);
    }

    public function getIdentidadCulturalId($nombre)
    {
        $query = ('
            SELECT i.id
            FROM identidad_cultural AS i WHERE i.nombre = $nombre;
        ');
        return $this->getCatalog($query);
    }

    public function getInstitucionId($nombre)
    {
        $query = ('
            SELECT i.id
            FROM institucion AS i WHERE i.nombre = $nombre;
        ');
        return $this->getCatalog($query);
    }

    public function getEscolaridadId($nombre)
    {
        $query = ('
            SELECT e.id
            FROM escolaridad AS e WHERE e.nombre = $nombre;
        ');
        return $this->getCatalog($query);
    }

    public function getMunicipioId()
    {
        $query = ('
            SELECT m.id
            FROM municipio AS m WHERE m.nombre = $nombre;
        ');
        return $this->getCatalog($query);
    }


    public function setInscripcion($participanteId, $eventoId)
    {
        $query = "INSERT INTO registro_evento (participante_id, evento_id) VALUES ($participanteId, $eventoId)";
        $this->mysqli->query($query);
        return mysqli_insert_id($this->mysqli);
    }

    public function setParticipante($dpi_cui, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $sexo, $departamento_id, $institucion_id, $grupo_objetivo_id, $correo_electronico, $celular, $FADN_id, $municipio_id, $fecha_nacimiento, $identidad_cultural_id, $escolaridad_id, $institucion_afin)
    {
        $query = "INSERT INTO participante (dpi_cui, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo, departamento_id, institucion_id, grupo_objetivo_id, correo_electronico, celular, FADN_id, municipio_id, fecha_nacimiento, identidad_cultural_id, escolaridad_id, institucion_afin)
        VALUES ($dpi_cui, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $sexo, $departamento_id, $institucion_id, $grupo_objetivo_id, $correo_electronico, $celular, $FADN_id, $municipio_id, $fecha_nacimiento, $identidad_cultural_id, $escolaridad_id, $institucion_afin)";
        $this->mysqli->query($query);
        return mysqli_insert_id($this->mysqli);
    }
}
