<?php

$mysqli = require __DIR__ . "/../database.php";

$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url( $url );
parse_str( $parts['query'], $query );
$evento_id = $query['id'];

$sql = "SELECT id, nombre, fecha FROM evento WHERE id = {$evento_id}";
$result = $mysqli->query($sql);

$sql = "SELECT participante.dpi_cui, participante.nombre_completo, participante.correo_electronico
        FROM participante
        INNER JOIN registro_evento ON participante.dpi_cui = registro_evento.participante_id
        WHERE registro_evento.evento_id = {$evento_id}";

$participants_result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <title>Eventos</title>
    </head>
    <body>
        <div class="container pt-3">
            <h1 class="text-center">Detalles de evento</h1>
        </div>
        <div class="container mt-3">
            <?php
                if ($result->num_rows > 0) {
                    $event = $result->fetch_assoc();

                    echo "
                        <p>Nombre: " . $event['nombre'] . "</p>
                        <p>Fecha: " . $event['fecha'] . "</p>
                    ";

                    if ($participants_result->num_rows > 0) {
                        $participants = $participants_result->fetch_all(MYSQLI_ASSOC);

                        echo "
                        <h3>Participantes</h3>
                        <table class='table table-striped'>
                            <thead>
                                <tr>
                                  <th scope='col'>CUI</th>
                                  <th scope='col'>Nombre Completo</th>
                                  <th scope='col'>Correo Electronico</th>
                                </tr>
                            </thead>
                            <tbody>
                        ";

                        foreach ($participants as $participant) {
                            $cui = $participant['dpi_cui'];
                            $name = $participant['nombre_completo'];
                            $email = $participant['correo_electronico'];

                            echo
                            "
                            <tr>
                                <th scope='row'>" . $cui . "</th>
                                <td>" . $name . "</td>
                                <td>" . $email . "</td>
                            </tr>
                            ";
                        }

                        echo "
                            </tbody>
                            </table>
                        ";
                    }
                } else {
                    echo "<p class='text-center fs-3'>El evento no existe</p>";
                }
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>