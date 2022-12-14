<?php

$mysqli = require __DIR__ . "/../database.php";

$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
$evento_id = $query['id'];

$sql = "SELECT e.id, e.nombre as nombre_evento, e.fecha, te.nombre as nombre_tipo
        FROM evento e
        INNER JOIN tipo_evento te ON e.tipo_evento_id = te.id
        WHERE e.id = {$evento_id}";
$result = $mysqli->query($sql);

$sql = "SELECT participante.dpi_cui, participante.primer_nombre, participante.segundo_nombre, participante.primer_apellido, participante.segundo_apellido, participante.correo_electronico
        FROM participante
        INNER JOIN registro_evento ON participante.id = registro_evento.participante_id
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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: -50px;">
            <a class="btn btn-primary " href='../events/list.php'>Ir a Eventos</a>
        </div>
    </div>
    <div class="container mt-3">
        <?php
        if ($result->num_rows > 0) {
            $event = $result->fetch_assoc();
            $date = new DateTime($event["fecha"]);
            echo "
                        <p>Nombre: " . $event['nombre_evento'] . "</p>
                        <p>Tipo evento: " . $event['nombre_tipo'] . "</p>
                        <p>Fecha: " . $date->format("d/m/Y") . "</p>
                        <p><a href='../inscripcion/index.php?id=" . $evento_id . "' class='btn btn-primary'>Pagina de inscripcion</a></p>
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
                    $first_name = $participant['primer_nombre'];
                    $second_name = $participant['segundo_nombre'];
                    $first_lastname = $participant['primer_apellido'];
                    $second_lastname = $participant['segundo_apellido'];
                    $email = $participant['correo_electronico'];

                    echo
                    "
                            <tr>
                                <th scope='row'>" . $cui . "</th>
                                <td>" . $first_lastname . " " . $second_lastname  . ", " . $first_name . " " . $second_name . "</td>
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