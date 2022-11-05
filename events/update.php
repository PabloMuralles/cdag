<?php

$mysqli = require __DIR__ . "/../database.php";

$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url( $url );
parse_str( $parts['query'], $query );
$evento_id = $query['id'];

$sql = "SELECT id, nombre, fecha FROM evento WHERE id = {$evento_id}";
$result = $mysqli->query($sql);
$event = $result -> fetch_assoc();

$sql = "SELECT id, nombre FROM tipo_evento";
$evetn_type_result = $mysqli->query($sql);

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
            <h1 class="text-center">Creación de eventos</h1>
        </div>

        <div class="container pt-3">
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" name="name" value = '<?php echo $event['nombre']; ?>' required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input class="form-control" type="date" name="date" value = '<?php echo $event['fecha']; ?>' required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo de evento</label>
                    <select class="form-select" aria-label="Default select example" name="event_type" required>
                        <?php
                        if ($result->num_rows > 0) {
                            $events = $result->fetch_all(MYSQLI_ASSOC);

                            foreach ($events as $event) {
                                $name = $event['nombre'];
                                $event_id = $event['id'];

                                echo
                                "
                                <option value=" . $event_id . ">" . $name . "</option>
                                ";
                            }
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>

            <?php

            if (!empty( $_POST)){
                $name = $_POST["name"];
                $date = $_POST["date"];
                $event_type = filter_input(INPUT_POST, "event_type", FILTER_VALIDATE_INT);

                if(!empty($name) || !empty($date) || !empty($event_type)){
                $sql = "";
                $mysqli->query($sql);
                $result = mysqli_insert_id($mysqli);
                //header("Location: list.php?id=" . $result);
                }
            }
            ?>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
