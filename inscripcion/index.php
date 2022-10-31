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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>

    <?php $_GET["idEvento"] = 1; ?>
    <!-- TO DO: Agregar validacion de Token para evento, ver si se envia el ID del evento directamente-->
    <h2>
        Inscripcion al evento <?php echo $_GET["idEvento"]; ?>:
    </h2>
    <form action="" method="GET">
        <p>Ingrese su CUI:
            <input type="text" name="CUI" value="<?php echo isset($_GET['CUI']) ? $_GET['CUI'] : '' ?>" title="CUI" placeholder="Ingrese CUI">
        </p>
        <input type="hidden" name="idEvento" value="<?php echo isset($_GET['idEvento']) ? $_GET['idEvento'] : '' ?>">
        <p><input type="submit" value="Validar CUI" /></p>
    </form>

    <h3>
        Datos registrados:
    </h3>

    <!-- Agregar validacion -->
    <?php if (isset($_GET['CUI'])) : ?>
        <!-- Declaracion de opciones -->
        <?php
        include("../_lib/classes/db/dbConnection.php");
        $mysqli = new \db\dbConnection();
        $opcioneSexo = array(
            'Hombre' => 'Hombre',
            'Mujer' => 'Mujer'
        );
        $opcionesFADN = array(
            '1' => 'Deporte Adaptado',
            '2' => 'Federación Deportiva Nacional de Ajedrez'
        );
        $opcionesDepartamento = array(
            '1' => 'Alta Verapaz',
            '2' => 'Baja Verapaz'
        );
        $opcionesInstitucion = array(
            '1' => 'CDAG',
            '2' => 'COG',
            '3' => 'Instituciones Afines'
        );
        $opcionesGrupoObjetivo = array(
            '1' => 'Árbitro',
            '2' => 'Asesor',
            '3' => 'Asistente Técnico'
        );
        $opcionesEscolaridad = $mysqli->getEscolaridad();
        $opcionesIdentidadCultural = array(
            '1' => 'Ladino/mestizo',
            '2' => 'Maya',
            '3' => 'Xinca'
        )
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
    <?php else : ?>
        <p> No se han encontrado datos con el CUI ingresado </p>
    <?php endif ?>

</body>

</html>