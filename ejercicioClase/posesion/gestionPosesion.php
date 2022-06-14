<?php
require "../database.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron&display=swap">
    <title>Ejercicio Clase</title>
</head>

<body>
    <div class="container my-4">
        <div class="row">
            <div class="col-1">
                <a href=".."><button class="btn btn-outline-success">Volver</button></a>
            </div>
            <div class="col-10">
                <h2>
                    <center>Bienvenidos al Gestor de Posesiones</center>
                </h2>
            </div>
        </div>
    </div>

    <div class="container p-0">
        <div class="row">

            <!-- Formulario de Registro -->
            <div class="col-4">
                <h3 class="mb-3">Ingrese datos:</h3>
                <form id="formCreate" method="POST">

                    <!--Select Persona-->
                    <div class="input-group my-2">
                        <label class="ms-3 my-2 me-2 text-black-50" for="personaPosesion">Para registrar la posesión debe pasar por Gestión Persona y registrarse.</label>
                        <select id="personaPosesion" name="personaPosesion" class="form-select">
                            <?php
                            //Consulta Select Personas
                            $query = "SELECT * FROM persona ORDER BY nombrePersona";
                            $result = $conn->query($query);
                            $numfilas = $result->num_rows;
                            if ($numfilas > 0) {
                            ?>
                                <option disabled selected>Seleccione su nombre</option>
                                <?php
                                for ($i = 0; $i < $numfilas; $i++) {
                                    $aux = $result->fetch_object();
                                ?>
                                    <option value="<?php echo $aux->idPersona; ?>"><?php echo $aux->nombrePersona . " " . $aux->apellidoPersona ?></option>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                            ?>
                                <option disabled selected>No hay Personas Registradas...</option>
                            <?php
                            }
                            ?>
                        </select>
                        <a href="../persona/gestionPersona.php">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </a>
                    </div>

                    <!--Select Viviendas-->
                    <div class="input-group my-2">
                        <label class="ms-3 my-2 me-2 text-black-50" for="viviendaPersona">Para registrar la posesión debe pasar por Gestion Viviendas y crear una Nueva Vivienda para poder visualizar su dirección.</label>
                        <select id="viviendaPersona" name="viviendaPersona" class="form-select">
                            <?php
                            //Consulta Select Viviendas
                            $query = "SELECT * FROM vivienda";
                            $result = $conn->query($query);
                            $numfilas = $result->num_rows;
                            if ($numfilas > 0) {
                            ?>
                                <option disabled selected>Seleccione la direccion registrada</option>
                                <?php
                                for ($i = 0; $i < $numfilas; $i++) {
                                    $aux = $result->fetch_object();
                                ?>
                                    <option value="<?php echo $aux->idVivienda; ?>"><?php echo $aux->direccionVivienda; ?></option>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                            ?>
                                <option disabled selected>No hay Viviendas Registradas...</option>
                            <?php
                            }
                            ?>
                        </select>
                        <a href="../vivienda/getionVivienda.php">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </a>
                    </div>

                    <button onclick="crearPosesion();" class="mb-4 btn btn-primary" form="formCreate" type="button">Consolidar Datos</button>
                </form>
            </div>

            <!-- Tabla de Consulta -->
            <div class="col-8">
                <?php
                //Conectamos para obtener la lista de personas
                $query = "SELECT * FROM posesion";
                $result = $conn->query($query);
                $numfilas = $result->num_rows;
                if ($numfilas > 0) {
                ?>
                    <!-- Tabla de Registros -->
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <center>#</center>
                                </th>
                                <th scope="col">
                                    <center>Nombre Apoderado</center>
                                </th>
                                <th scope="col">
                                    <center>Dirección Posesión</center>
                                </th>
                                <th scope="col">
                                    <center>Modificar</center>
                                </th>
                                <th scope="col">
                                    <center>Eliminar</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < $numfilas; $i++) {
                                $aux = $result->fetch_object();
                            ?>
                                <tr>
                                    <form id="formPosesion<?php echo $aux->idPosesion; ?>" method="POST">
                                        <input type="hidden" name="idPosesion" value="<?php echo $aux->idPosesion; ?>">
                                        <th class="align-middle" scope="row">
                                            <center><?php echo $i + 1; ?></center>
                                        </th>

                                        <td class="align-middle">
                                            <select id="apoderadoPosesion" name="apoderadoPosesion" class="form-select" form="formPosesion<?php echo $aux->idPosesion; ?>">
                                                <?php
                                                //subQuery  
                                                $subQ = "SELECT * FROM persona WHERE idPersona = '$aux->Persona_idPersona';";
                                                $subR = $conn->query($subQ);
                                                $subA = $subR->fetch_object();

                                                //Consulta Select Personas
                                                $query = "SELECT * FROM persona ORDER BY nombrePersona";
                                                $result2 = $conn->query($query);
                                                $numfilas2 = $result2->num_rows;
                                                if ($numfilas2 > 0) {
                                                ?>
                                                    <option selected value="<?php echo $subA->idPersona; ?>"><?php echo $subA->nombrePersona . " " . $subA->apellidoPersona; ?></option>
                                                    <?php
                                                    for ($j = 0; $j < $numfilas2; $j++) {
                                                        $aux2 = $result2->fetch_object();
                                                    ?>
                                                        <option value="<?php echo $aux2->idPersona; ?>"><?php echo $aux2->nombrePersona . " " . $aux2->apellidoPersona; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php
                                                } else {
                                                ?>
                                                    <option disabled selected>No hay Personas Registradas...</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="align-middle">
                                            <select id="direccionPosesion" name="direccionPosesion" class="form-select" form="formPosesion<?php echo $aux->idPosesion; ?>">
                                                <?php
                                                //subQuery  
                                                $subQ = "SELECT * FROM vivienda WHERE idVivienda = '$aux->Vivienda_idVivienda';";
                                                $subR = $conn->query($subQ);
                                                $subA = $subR->fetch_object();

                                                //Consulta Select Municipios
                                                $query = "SELECT * FROM vivienda";
                                                $result2 = $conn->query($query);
                                                $numfilas2 = $result2->num_rows;
                                                if ($numfilas2 > 0) {
                                                ?>
                                                    <option selected value="<?php echo $subA->idVivienda; ?>"><?php echo $subA->direccionVivienda; ?></option>
                                                    <?php
                                                    for ($j = 0; $j < $numfilas2; $j++) {
                                                        $aux2 = $result2->fetch_object();
                                                    ?>
                                                        <option value="<?php echo $aux2->idVivienda; ?>"><?php echo $aux2->direccionVivienda; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php
                                                } else {
                                                ?>
                                                    <option disabled selected>No hay Viviendas Registradas...</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="align-middle">
                                            <center><button onclick="updatePosesion(<?php echo $aux->idPosesion; ?>);" form="formPosesion<?php echo $aux->idPosesion; ?>" id="actualizarPosesion" class="btn btn-outline-warning btn-sm" type="button">Actualizar</button></center>
                                        </td>
                                        <td class="align-middle">
                                            <center><button onclick="deletePosesion(<?php echo $aux->idPosesion; ?>);" form="formPosesion<?php echo $aux->idPosesion; ?>" id="borrarPosesion<?php echo $aux->idPosesion; ?>" class="btn btn-outline-danger btn-sm" type="button">Borrar</button></center>
                                        </td>
                                    </form>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                ?>
                    <h3>Upps... No hay Posesiones registradas</h3>
                <?php
                }
                cerrarConexion();
                ?>
            </div>

        </div>
    </div>
</body>

<script>
    function updatePosesion(idPosesion) {
        let nombre = '#formPosesion' + idPosesion;
        let datos = $(nombre).serialize();
        $.ajax({
            type: "POST",
            url: "updatePosesion.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Cambios Guardados con exito");
                    window.location.reload();
                    return 0;
                } else if (r == 2) {
                    alert("Upps ha ocurrido un error al intentar actualizar los datos de la posesión, intenta de nuevo");
                }
            }
        });
    }

    function deletePosesion(idPosesion) {
        let nombre = '#formPosesion' + idPosesion;
        let datos = $(nombre).serialize();
        $.ajax({
            type: "POST",
            url: "deletePosesion.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Cambios Guardados con exito");
                    window.location.reload();
                    return 0;
                } else if (r == 2) {
                    alert("Upps ha ocurrido un error al intentar eliminar la posesión, intenta de nuevo");
                }
            }
        });
    }

    function crearPosesion() {
        let datos = $("#formCreate").serialize();
        $.ajax({
            type: "POST",
            url: "createPosesion.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Cambios Guardados con exito");
                    window.location.reload();
                    return 0;
                } else if (r != 1) {
                    alert("Upps ha ocurrido un error al intentar almacenar la posesión, intenta de nuevo");
                    alert(r);
                }
            }
        });
    }
</script>

</html>