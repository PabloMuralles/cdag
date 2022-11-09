<script type="text/JavaScript">
    var institucionAfin;
    // 3 = Instituciones Afin
    var llave = 3;
function checkInstitucion(select) {
  institucionAfin = document.getElementById('institucionAfin');
  if (select.options[select.selectedIndex].value == llave) {
    institucionAfin.style.display = 'block';
  }
  else {
    institucionAfin.style.display = 'none';
  }
}
</script>

<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    include("metadata.php");
    $metadata = new \inscripcion\metadata();
    $evento = $metadata->getEvento($_GET["id"]);
    if (!isset($evento)) {
        header("Location: msg/not_found.php");
    } else {
        $date = new DateTime($evento["fecha"]);
        echo "<h2> Inscripcion al evento " . $evento["nombre_evento"] . "</h2>" .
            "<p><b> Tipo de evento: </b>" . $evento["tipo_evento"] . "</p>" .
            "<p><b> Fecha: </b>" . $date->format("d/m/Y") . "</p>";
    }
    ?>
    <!-- TO DO: Agregar validacion de Token para evento, ver si se envia el ID del evento directamente-->

    <form action="" method="GET">
        <p>Ingrese su CUI:
            <input type="text" name="CUI" value="<?php echo isset($_GET['CUI']) ? $_GET['CUI'] : '' ?>" title="CUI" placeholder="Ingrese CUI">
        </p>
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
        <p><input type="submit" value="Validar CUI" /></p>
    </form>

    <h3>
        Datos registrados:
    </h3>

    <!-- Agregar validacion -->
    <?php if (isset($_GET['CUI'])) : ?>
        <!-- Declaracion de opciones -->
        <?php
        $opcioneSexo = array(
            'Hombre' => 'Hombre',
            'Mujer' => 'Mujer'
        );
        $opcionesFADN = $metadata->getFadn_deporte();
        $opcionesDepartamento = $metadata->getDepartamento();
        $opcionesInstitucion = $metadata->getInstitucion();
        $opcionesGrupoObjetivo = $metadata->getGrupo_objetivo();
        $opcionesEscolaridad = $metadata->getEscolaridad();
        $opcionesIdentidadCultural = $metadata->getIdentidad_cultural();
        ?>

        <form action="" method="POST">
            <b>
                <p>Nombre completo:</p>
            </b>
            <p>Primer nombre:
                <input type="text" name="p_nombre" value="dd" title="p_nombre">
            </p>
            <p>Segundo nombre:
                <input type="text" name="s_nombre" value="dd" title="s_nombre">
            </p>
            <p>Primer apellido:
                <input type="text" name="p_apellido" value="dd" title="p_apellido">
            </p>
            <p>Segundo apellido:
                <input type="text" name="s_apellido" value="dd" title="s_apellido">
            </p>
            <p>Sexo:
                <select name="sexo">
                    <option value="sexo">Seleccione sexo</option>
                    <?php foreach ($opcioneSexo as $key => $value) : ?>
                        <option value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>FADN o Deporte:
                <select name="FADN">
                    <option value="FADN">Seleccione FADN o Deporte</option>
                    <?php foreach ($opcionesFADN as $key => $value) : ?>
                        <option value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>Departamento:
                <select name="departamento">
                    <option value="departamento">Seleccione departamento</option>
                    <?php foreach ($opcionesDepartamento as $key => $value) : ?>
                        <option value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>Institución a la que pertenece:
                <select onchange="checkInstitucion(this)" name="institucion">
                    <option value="institucion">Seleccione institución</option>
                    <?php foreach ($opcionesInstitucion as $key => $value) : ?>
                        <option value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p id='institucionAfin' style="display: none">
                Institucion Afin:
                <input name='institucionAfin' type="text" />
            </p>
            <!-- TO DO: Agregar una validacion de que Instituciones Afines este seleccionado, sino vacio de debe de enviar -->
            <p>Grupo Objetivo:
                <select name="grupoObjetivo">
                    <option value="grupoObjetivo">Seleccione grupo objetivo</option>
                    <?php foreach ($opcionesGrupoObjetivo as $key => $value) : ?>
                        <option value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>Correo Electrónico:
                <input type="text" name="correo" value="dd" title="correo">
            </p>
            <p>Celular:
                <input type="text" name="celular" value="dd" title="celular">
            </p>
            <p>CUI-DPI/Pasaporte -si es extrajero-:
                <input type="text" name="CUI" value="<?php echo isset($_GET['CUI']) ? $_GET['CUI'] : '' ?>" title="CUI">
            </p>
            <!-- TO DO: Agregar una validacion de fecha para formato que pide el excel-->
            <p>Escolaridad:
                <select name="escolaridad">
                    <option value="escolaridad">Seleccione escolaridad</option>
                    <?php foreach ($opcionesEscolaridad as $key => $value) : ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>Identidad Cultural:
                <select name="identidadCultural">
                    <option value="identidadCultural">Seleccione identidad cultural</option>
                    <?php foreach ($opcionesIdentidadCultural as $key => $value) : ?>
                        <option value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>Municipio:
                <input type="text" name="municipio" value="dd" title="municipio">
            </p>
            <p>Fecha de nacimiento:
                <input type="date" name="fechaNacimiento" value="2022-10-21" title="fechaNacimiento">
            </p>

            <p> ** Si ha realizado alguna actualización en su información personal, dar click en "Guardar Cambios" **</p>
            <input type="submit" name="accion" value="Guardar Cambios">
            <input type="submit" name="accion" value="Inscribirse">
        </form>
        <?php
        if (!empty($_POST) && isset($_POST["accion"])) {
            if ($_POST["accion"] == "Inscribirse") {
                // Inscripcion
                $name = $_POST["name"];
                $date = $_POST["date"];
                $event_type = filter_input(INPUT_POST, "event_type", FILTER_VALIDATE_INT);

                if (!empty($name) || !empty($date) || !empty($event_type)) {
                    $sql = "INSERT INTO evento (nombre, fecha, tipo_evento_id) VALUES ('$name', '$date', $event_type)";
                    $mysqli->query($sql);
                    $result = mysqli_insert_id($mysqli);
                    header("Location: detail.php?id=" . $result);
                }
            } else {
                //Guardar cambios
                $name = $_POST["name"];
                $date = $_POST["date"];
                $event_type = filter_input(INPUT_POST, "event_type", FILTER_VALIDATE_INT);

                if (!empty($name) || !empty($date) || !empty($event_type)) {
                    $sql = "INSERT INTO evento (nombre, fecha, tipo_evento_id) VALUES ('$name', '$date', $event_type)";
                    $mysqli->query($sql);
                    $result = mysqli_insert_id($mysqli);
                    header("Location: detail.php?id=" . $result);
                }
            }
        }
        ?>
    <?php else : ?>
        <p> No se han encontrado datos con el CUI ingresado </p>
    <?php endif ?>

</body>

</html>