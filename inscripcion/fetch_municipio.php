<?php

if(isset($_POST['get_option']))
{
    $mysqli = require __DIR__ . "/../database.php";

    $departamento = $_POST['get_option'];
    $sql = "SELECT m.* FROM municipio AS m WHERE m.departamento_id = $departamento";
    $result = $mysqli->query($sql);
    $municipios = $result->fetch_all(MYSQLI_ASSOC);

    echo "<option value=''>Seleccione municipio</option>";

    foreach ($municipios as $municipio) {
        $id = $municipio['id'];
        $nombre = $municipio['nombre'];

        echo '<option value = ' . $id . '>' . $nombre . '</option>';
    }
}

?>