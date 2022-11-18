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
    <title>Inscripcion</title>
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
        echo "<p><b> Tipo de evento: </b>" . $evento["tipo_evento"] . "</p>" .
            "<p><b> Fecha: </b>" . $date->format("d/m/Y") . "</p>";

        echo "</div>";

        if (isset($_GET['CUI'])) {
            $_GET['CUI'] = trim($_GET['CUI']);
        }
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


    <?php if (isset($_GET['CUI']) && ($_GET['CUI'] != "")) : ?>
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

        $cuiParticipante = "'" . trim($_GET['CUI']) . "'";
        $participante = $metadata->getParticipante($cuiParticipante);

        $existeParticipante = isset($participante);
        if (!$existeParticipante) {
            echo "<div class='container pt-3'>";
            echo "<p class='text-danger'>** CUI no encontrado en nuestra base de datos, valide si el dato fue ingresado sin guiones y sin espacios **</p>";
            echo "<p class='text-danger'>** En caso de que el CUI este correcto, por favor llenar datos y presionar dar click en \"Guardar Cambios\" y luego dar click en \"Inscribirse\" **</p>";
            echo "<span class='text-danger'>* Campo requerido</span>";
            echo "</div>";
        }
        ?>

        <form action="" method="POST">
            <div class="container pt-3">
                <b>
                    <p>Nombre completo:</p>
                </b>

                <div class="mb-3">
                    <label class="form-label">Primer Nombre:</label><span class="text-danger"> * </span>
                    <input class="form-control" type="text" name="p_nombre" value="<?php echo isset($participante["primer_nombre"]) ? $participante["primer_nombre"] : '' ?>" title="p_nombre" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                </div>

                <div class="mb-3">
                    <label class="form-label">Segundo nombre:</label>
                    <input class="form-control" type="text" name="s_nombre" value="<?php echo isset($participante["segundo_nombre"]) ? $participante["segundo_nombre"] : '' ?>" title="s_nombre" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                </div>

                <div class="mb-3">
                    <label class="form-label">Primer apellido:</label><span class="text-danger"> * </span>
                    <input class="form-control" type="text" name="p_apellido" value="<?php echo isset($participante["primer_apellido"]) ? $participante["primer_apellido"] : '' ?>" title="p_apellido" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                </div>

                <div class="mb-3">
                    <label class="form-label">Segundo apellido:</label>
                    <input class="form-control" type="text" name="s_apellido" value="<?php echo isset($participante["segundo_apellido"]) ? $participante["segundo_apellido"] : '' ?>" title="s_apellido" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sexo:</label><span class="text-danger"> * </span>
                    <select class="form-select" name="sexo" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                        <option value=''>Seleccione sexo</option>
                        <?php foreach ($opcioneSexo as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["sexo"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label">Seleccione FADN o Deporte:</label><span class="text-danger"> * </span>
                    <select class="form-select" name="FADN" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                        <option value=''>Seleccione FADN o Deporte</option>
                        <?php foreach ($opcionesFADN as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["FADN_id"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Departamento:</label>
                    <select class="form-select" name="departamento" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                        <option value=''>Seleccione departamento</option>
                        <?php foreach ($opcionesDepartamento as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["departamento_id"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Institución a la que pertenece:</label><span class="text-danger"> * </span>
                    <select class="form-select" onchange="checkInstitucion(this)" name="institucion" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                        <option value=''>Seleccione institución</option>
                        <?php foreach ($opcionesInstitucion as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["institucion_id"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" id='institucionAfin' style="display: none">
                        Institucion Afin:
                        <input class="form-control" name='institucionAfin' value="<?php echo isset($participante["institucion_afin"]) ? $participante["institucion_afin"] : '' ?>" type="text" <?php echo $existeParticipante ? 'disabled' : '' ?> />
                    </label>
                </div>

                <div class="mb-3">
                    <label class="form-label">Grupo Objetivo:</label><span class="text-danger"> * </span>
                    <select class="form-select" name="grupoObjetivo" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                        <option value=''>Seleccione grupo objetivo</option>
                        <?php foreach ($opcionesGrupoObjetivo as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["grupo_objetivo_id"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo Electrónico:</label><span class="text-danger"> * </span>
                    <input class="form-control" type="text" name="correo" value="<?php echo isset($participante["correo_electronico"]) ? $participante["correo_electronico"] : '' ?>" title="correo" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                </div>

                <div class="mb-3">
                    <label class="form-label">Celular:</label><span class="text-danger"> * </span>
                    <input class="form-control" type="text" name="celular" value="<?php echo isset($participante["celular"]) ? $participante["celular"] : '' ?>" title="celular" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                </div>

                <div class="mb-3">
                    <label class="form-label">CUI-DPI/Pasaporte -si es extrajero-:</label>
                    <input class="form-control" type="text" name="CUI" value="<?php echo isset($_GET['CUI']) ? $_GET['CUI'] : '' ?>" title="CUI" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Escolaridad:</label>
                    <select class="form-select" name="escolaridad" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                        <option value=''>Seleccione escolaridad</option>
                        <?php foreach ($opcionesEscolaridad as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["escolaridad_id"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Identidad Cultural:</label>
                    <select class="form-select" name="identidadCultural" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                        <option value=''>Seleccione identidad cultural</option>
                        <?php foreach ($opcionesIdentidadCultural as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["identidad_cultural_id"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Municipio:</label>
                    <select class="form-select" name="municipio" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                        <option value=''>Seleccione identidad cultural</option>
                        <?php foreach ($opcionesMunicipio as $key => $value) : ?>
                            <option <?php echo isset($participante) && $participante["municipio_id"] == $key ? 'selected="selected"' : '' ?> value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($value); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label">Fecha de nacimiento:</label>
                    <input class="form-control" type="date" name="fechaNacimiento" value="<?php echo isset($participante["fecha_nacimiento"]) ? $participante["fecha_nacimiento"] : '' ?>" title="fechaNacimiento" <?php echo $existeParticipante ? 'disabled' : '' ?>>
                </div>

                <div>
                    <input class="btn btn-primary" type="submit" name="accion" value="Guardar Cambios">
                    <input class="btn btn-primary" type="submit" name="accion" value="Inscribirse">
                </div>

            </div>
        </form>
        <?php
        if (!empty($_POST) && isset($_POST["accion"])) {
            $participanteInscrito = $metadata->getParticipante($_GET['CUI']);
            if ($_POST["accion"] == "Inscribirse") {
                $eventoInscrito = $metadata->getEvento($_GET["id"]);
                if (isset($participanteInscrito) && isset($eventoInscrito)) {
                    // Inscripcion
                    $participanteId = $participanteInscrito["id"];
                    $eventoId = $eventoInscrito["id"];
                    $registroInscripcion = $metadata->getRegistro($participanteId, $eventoId);
                    if (!empty($registroInscripcion)) {
                        echo "<script> alert('Ya se encuentra inscrito');
                                window.location.href = 'msg/confirmacion.php';
                                </script>";
                    } else {
                        $insertado = $metadata->setInscripcion($participanteId, $eventoId);
                        if ($insertado != 0) {
                            echo "<script> alert('Se ha inscrito correctamente');
                                    window.location.href = 'msg/confirmacion.php';
                                    </script>";
                        } else {
                            echo "<script> alert('Se ha presentado un error, intente de nuevo');";
                        }
                    }
                } else {
                    echo "<script> alert('No se encontrado el evento y/o al participante');";
                }
            } else {
                //Guardar cambios
                if (empty($participanteInscrito)) {
                    $campoFaltante = false;
                    foreach ($_POST as $key => $value) {
                        if (trim($_POST[$key]) === '') {
                            if (
                                $key == 'p_nombre' || $key == 'p_apellido' || $key == 'sexo' || $key == 'institucion'
                                || $key == 'grupoObjetivo' || $key == 'correo' || $key == 'celular' || $key == 'FADN'
                            ) {
                                $campoFaltante = true;
                            }
                            $_POST[$key] = 'NULL';
                        } else if (is_numeric($_POST[$key])) {
                            $_POST[$key] = trim($_POST[$key]);
                        } else {
                            $_POST[$key] = "'" . trim($_POST[$key]) . "'";
                        }
                    }
                    if ($campoFaltante) {
                        echo "<script> alert('Revise los campos requeridos'); </script>";
                    } else {
                        $insertado = $metadata->setParticipante(
                            $_GET["CUI"],
                            $_POST["p_nombre"],
                            $_POST["s_nombre"],
                            $_POST["p_apellido"],
                            $_POST["s_apellido"],
                            $_POST["sexo"],
                            $_POST["departamento"],
                            $_POST["institucion"],
                            $_POST["grupoObjetivo"],
                            $_POST["correo"],
                            $_POST["celular"],
                            $_POST["FADN"],
                            $_POST["municipio"],
                            $_POST["fechaNacimiento"],
                            $_POST["identidadCultural"],
                            $_POST["escolaridad"],
                            $_POST["institucionAfin"]
                        );
                        if ($insertado != 0) {
                            echo "<script> alert('Se ha guardado los datos del participante');
                            window.location.href = 'index.php?id=" . $_GET["id"] . "&CUI=" . $_GET["CUI"] . "';</script>";
                        } else {
                            echo "<script> alert('Se ha presentado un error, intente de nuevo');</script>";
                        }
                    }
                } else {
                    echo "<script> alert('El participante ya se encuentra registrado en la db');</script>";
                }
            }
        }
        ?>
    <?php else : ?>
        <div class="container pt-3">
            <p> No se han encontrado datos con el CUI ingresado </p>
        </div>

    <?php endif ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>