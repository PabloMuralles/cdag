<?php

$mysqli = require __DIR__ . "/../database.php";

$sql = "SELECT id, nombre FROM evento";
$result = $mysqli->query($sql);

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
    <table style="width: 100%;">
        <tr>
            <th style="width: 30%;"></th>
            <th style="width: 40%;">
                <h1 class="text-center">Eventos</h1>
            </th>
            <th style="width: 30%; margin-bottom: 0;">
                <div class="text-center"><a class="btn btn-primary " href='../events/create.php'>Crear Evento</a>
                </div>
            </th>
        </tr>
    </table>

    <div class="container mt-3">
        <?php
        ob_start();
        if ($result->num_rows > 0) {
            $events = $result->fetch_all(MYSQLI_ASSOC);

            echo "<ul class='list-group list-group-flush'>";

            foreach ($events as $event) {
                $id = $event['id'];
                $name = $event['nombre'];

                echo
                "
                        <li class='list-group-item d-flex justify-content-between align-items-center'>
                            <p>" . $name . "</p>
                            <div class='btn-group'>
                            <a href='../events/detail.php?id=" . $id . "' class='btn btn-primary'>Detalles</a>
                            <a href='../events/update.php?id=" . $id . "' class='btn btn-primary'>Editar</a>
                            <a href='../events/delete.php?id=" . $id . "' class='btn btn-primary'>Eliminar</a>
                            </div>
                        </li>
                        ";
            }
            echo "</ul>";
        } else {
            echo "<p class='text-center fs-3'>No existe ningun evento</p>";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>