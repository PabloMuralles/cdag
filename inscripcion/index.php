<script type="text/JavaScript">
    var institucionAfin;
    // 12 = Instituciones Afin
    var llave = 12;
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
        echo "<center><h2> Inscripcion al evento: " . $evento["nombre_evento"] . "</h2></center>";
        echo "<div class='container pt-3'";
        echo 
            "<p><b> Tipo de evento: </b>" . $evento["tipo_evento"] . "</p>" .
            "<p><b> Fecha: </b>" . $date->format("d/m/Y") . "</p>";
        echo "</div>";
    }
    ?>

    <form action="" method="GET">
        <div class="container pt-3">
            <div class="mb-3">
                <label class="form-label">Ingrese su CUI:</label>
                <input class="form-control" type="text" name="CUI" value="<?php echo isset($_GET['CUI']) ? $_GET['CUI'] : '' ?>" title="CUI" placeholder="Ingrese CUI">
            </div>
            <div class="mb-3">
                <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
            </div>
        
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Validar CUI" />
            </div>
        
        </div>
       
    </form>

    <div class="container pt-3">
        <h3>
            Datos registrados:
        </h3>
    </div>


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
        $opcionesMunicipio = $metadata->getMunicipio();

        $participante = $metadata->getParticipante($_GET['CUI']);
        if (!isset($participante)) {
            echo "<p>** CUI no encontrado en nuestra base de datos, valide si el dato fue ingresado sin guiones y sin espacios **</p>";
            echo "<p>** En caso de que el CUI este correcto, por favor llenar datos y presionar dar click en \"Guardar Cambios\" y luego dar click en \"Inscribirse\" **</p>";
        }
        ?>

        <form action="" method="POST">
            <div class="container pt-3">
                <b>
                    <p>Nombre completo:</p>
                </b>
                <div>
                    <label class="form-label">Primer Nombre:</label>
                    <input class="form-control" type="text" name="p_nombre" value="<?php echo isset($participante["primer_nombre"]) ? $participante["primer_nombre"] : '' ?>" title="p_nombre" placeholder="Ingrese su Primer Nombre">
                </div>

                <div>
                    <label class="form-label">Segundo nombre:</label>
                    <input class="form-control" type="text" name="s_nombre" value="<?php echo isset($participante["segundo_nombre"]) ? $participante["segundo_nombre"] : '' ?>" title="s_nombre" placeholder="Ingrese su Segundo Nombre">
                </div>

                <div>
                    <label class="form-label">Primer apellido:</label>
                    <input class="form-control" type="text" name="p_apellido" value="<?php echo isset($participante["primer_apellido"]) ? $participante["primer_apellido"] : '' ?>" title="p_apellido" placeholder="Ingrese su Primer Apellido">
                </div>

                <div>
                    <label class="form-label">Segundo apellido:</label>
                    <input class="form-control" type="text" name="s_apellido" value="<?php echo isset($participante["segundo_apellido"]) ? $participante["segundo_apellido"] : '' ?>" title="s_apellido" placeholder="Ingrese su Segundo Apellido">
                </div>

                <div>
                    <label class="form-label">Sexo:</label>
                    <select  class="form-select" name="sexo" place>
                        <option value="sexo">Seleccione sexo</option>
                        <?php foreach ($opcioneSexo as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["sexo"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="form-label">Seleccione FADN o Deporte:</label>
                    <select class="form-select" name="FADN">
                        <option value="FADN">Seleccione FADN o Deporte</option>
                        <?php foreach ($opcionesFADN as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["FADN_id"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="form-label">Departamento:</label>
                    <select class="form-select" name="departamento">
                        <option value="departamento">Seleccione departamento</option>
                        <?php foreach ($opcionesDepartamento as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["departamento_id"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="form-label">Institución a la que pertenece:</label>
                    <select class="form-select" onchange="checkInstitucion(this)" name="institucion">
                        <option value="institucion">Seleccione institución</option>
                        <?php foreach ($opcionesInstitucion as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["institucion_id"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            
                <p id='institucionAfin' style="display: none">
                    <input name='institucionAfin' value="<?php echo isset($participante["institucion_afin"]) ? $participante["institucion_afin"] : '' ?>" type="text" />
                </p>
                <!-- TO DO: Agregar una validacion de que Instituciones Afines este seleccionado, sino vacio de debe de enviar -->

                <div>
                    <label class="form-label">Grupo Objetivo:</label>
                    <select class="form-select" name="grupoObjetivo">
                        <option value="grupoObjetivo">Seleccione grupo objetivo</option>
                        <?php foreach ($opcionesGrupoObjetivo as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["grupo_objetivo_id"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="form-label">Correo Electrónico:</label>
                    <input class="form-control" type="text" name="correo" value="<?php echo isset($participante["correo_electronico"]) ? $participante["correo_electronico"] : '' ?>" title="correo" placeholder="Ingrese su Correo Electrónico">
                </div>

                <div>
                    <label class="form-label">Celular:</label>
                    <input class="form-control" type="text" name="celular" value="<?php echo isset($participante["celular"]) ? $participante["celular"] : '' ?>" title="celular" placeholder="Ingrese su Celular">
                </div>

                <div>
                    <label class="form-label">CUI-DPI/Pasaporte -si es extrajero-:</label>
                    <input class="form-control" type="text" name="CUI" value="<?php echo isset($_GET['CUI']) ? $_GET['CUI'] : '' ?>" title="CUI">
                </div>

                <!-- TO DO: Agregar una validacion de fecha para formato que pide el excel-->

                <div>
                    <label class="form-label">Escolaridad:</label>
                    <select class="form-select" name="escolaridad">
                        <option value="escolaridad">Seleccione escolaridad</option>
                        <?php foreach ($opcionesEscolaridad as $key => $value) : ?>
                            <option value="<?php echo isset($participante) && isset($participante["escolaridad_id "]) ? $participante["escolaridad_id "] : '' ?>" value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="form-label">Identidad Cultural:</label>
                    <select class="form-select" name="identidadCultural">
                        <option value="identidadCultural">Seleccione identidad cultural</option>
                        <?php foreach ($opcionesIdentidadCultural as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["identidad_cultural_id"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="form-label">Municipio:</label>
                    <select class="form-select" name="municipio">
                        <option value="municipio">Seleccione identidad cultural</option>
                        <?php foreach ($opcionesMunicipio as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["municipio_id"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                        <?php endforeach; ?>
                     </select>
                </div>

                <div>
                    <label class="form-label">Fecha de nacimiento:</label>
                    <input class="form-control" type="date" name="fechaNacimiento" value="<?php echo isset($participante["fecha_nacimiento"]) ? $participante["fecha_nacimiento"] : '' ?>" title="fechaNacimiento">
                </div>
            

                <p> ** Si ha realizado alguna actualización en su información personal, dar click en "Guardar Cambios" **</p>

                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" name="accion" value="Guardar Cambios">
                    <input class="btn btn-primary" type="submit" name="accion" value="Inscribirse">
                </div>
               
            </div>
        </form>
        <?php
        if (!empty($_POST) && isset($_POST["accion"])) {
            if ($_POST["accion"] == "Inscribirse") {
                $participanteInscrito = $metadata->getParticipante($_GET['CUI']);
                $eventoInscrito = $metadata->getEvento($_GET["id"]);
                if (isset($participanteInscrito) && isset($eventoInscrito)) {
                    // Inscripcion
                    $participanteId = $participanteInscrito["id"];
                    $eventoId = $eventoInscrito["id"];
                    $registroInscripcion = $metadata->getRegistro($participanteId, $eventoId);
                    if (!empty($participanteInscrito) && !empty($eventoInscrito)) {
                        if (!empty($registroInscripcion)) {
                            echo "<script> alert('Ya se encuentra inscrito');
                                window.location.href = 'msg/confirmacion.php';
                                </script>";
                        } else {
                            $insertado = $metadata->setInscripcion($participanteId, $eventoId);
                            if (isset($insertado)) {
                                echo "<script> alert('Se ha inscrito correctamente');
                                    window.location.href = 'msg/confirmacion.php';
                                    </script>";
                            }
                        }
                    }
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
                }
            }
        }
        ?>
    <?php else : ?>
        <div  class="container pt-3">
            <p> No se han encontrado datos con el CUI ingresado </p>
        </div>
        
    <?php endif ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>