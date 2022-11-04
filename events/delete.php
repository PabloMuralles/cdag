<?php
    require __DIR__ . "/CRUD.php";
 
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url( $url );
    parse_str( $parts['query'], $query );
    $evento_id = $query['id'];

    $result = select_info("evento","id",$evento_id);

    $event_data = $result->fetch_row();

    $result = inner_join("evento","tipo_evento","tipo_evento_id","id");

    $name_type = $result->fetch_row();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Eliminacion</title>
</head>
<body>
    <h1>Eliminación de evento: <?php echo $event_data[1] ?></h1>

    <form method="post">

        <div>
            <label for="nombre_evento">Nombre Evento:</label>

            <input type="text" id="nombre_evento" name="nombre_evento" value="<?= htmlspecialchars($event_data[1] ?? "") ?>" disabled >
        </div>

        <div>
            <label for="primer_nombre">Tipo de Evento:</label>

            <input type="text" id="primer_nombre" name="cui" value="<?= htmlspecialchars($name_type[5] ?? "") ?>" disabled >
        </div>

        <div>
            <label for="primer_nombre">Fecha de Creación</label>

            <input type="text" id="primer_nombre" name="cui" value="<?= htmlspecialchars($event_data[2] ?? "") ?>" disabled >
        </div>

        <h2>Seguro que desea Eliminar el evento</h2>
        <button type="submit" name="btn-si" value="si">Si</button>
        <button type="submit" name="btn-no" value="no">No</button>

    </form>

    <?php

        if (!empty($_POST)){

            if ($_POST["btn-si"] == "si"){

                delete_event($evento_id);
                header("Location: list.php");

            }else{
                header("Location: list.php");
            }
        }

    ?>



 
</body>
</html>