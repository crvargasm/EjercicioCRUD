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
                    <center>Bienvenidos al Gestor de Personas</center>
                </h2>
            </div>
        </div>
    </div>
    <div class="container p-0">
        <div class="row">

            <!-- Formulario de Registro -->
            <div class="col-3">
                <h3 class="mb-3">Ingrese datos:</h3>
                <form id="formCreate" method="POST">

                    <div class="input-group my-2">
                        <input id="nombrePersona" name="nombrePersona" class="form-control" type="text" placeholder="Ingrese los Nombres de la Persona">
                    </div>

                    <div class="input-group my-2">
                        <input id="apellidoPersona" name="apellidoPersona" class="form-control" type="text" placeholder="Ingrese los Apellidos de la Persona">
                    </div>

                    <div class="input-group my-2">
                        <input id="telefonoPersona" name="telefonoPersona" class="form-control" type="tel" placeholder="Ingrese Número de Contacto">
                    </div>

                    <div class="input-group my-2">
                        <input id="edadPersona" name="edadPersona" class="form-control me-1" type="number" placeholder="Ingrese edad">
                        <select id="sexoPersona" name="sexoPersona" class="form-select">
                            <option disabled selected>Seleccione...</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>

                    <!--Select Municipio-->
                    <div class="input-group my-2">
                        <label class="ms-3 my-2 me-2 text-black-50" for="municipioPersona">Para registrarse debe pasar por Gestion Municipio y registrar el Municipio para poder visualizar su Municipio.</label>
                        <select id="municipioPersona" name="municipioPersona" class="form-select">
                            <?php
                            //Consulta Select Municipios
                            $query = "SELECT * FROM municipio";
                            $result = $conn->query($query);
                            $numfilas = $result->num_rows;
                            if ($numfilas > 0) {
                            ?>
                                <option disabled selected>Seleccione el Municipio</option>
                                <?php
                                for ($i = 0; $i < $numfilas; $i++) {
                                    $aux = $result->fetch_object();
                                ?>
                                    <option value="<?php echo $aux->idMunicipio; ?>"><?php echo $aux->nombreMunicipio; ?></option>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                            ?>
                                <option disabled selected>No hay Municipios Registrados...</option>
                            <?php
                            }
                            ?>
                        </select>
                        <a href="../municipio/gestionMunicipios.php">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </a>
                    </div>

                    <!--Select Viviendas-->
                    <div class="input-group my-2">
                        <label class="ms-3 my-2 me-2 text-black-50" for="viviendaPersona">Para registrarse debe pasar por Gestion Viviendas y crear una Nueva Vivienda para poder visualizar su dirección.</label>
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

                    <!--Select Familia NUIF-->
                    <div class="input-group my-2">
                        <label class="ms-3 my-2 me-2 text-black-50" for="familiaPersona">Para registrarse debe pasar por Gestion Familias y crear una Nueva Familia para obtener su Número Único de Identificación Familiar (NUIF).</label>
                        <select id="familiaPersona" name="familiaPersona" class="form-select">
                            <?php
                            //Consulta Select familias
                            $query = "SELECT * FROM familia";
                            $result = $conn->query($query);
                            $numfilas = $result->num_rows;
                            if ($numfilas > 0) {
                            ?>
                                <option disabled selected>Seleccione su NUIF</option>
                                <?php
                                for ($i = 0; $i < $numfilas; $i++) {
                                    $aux = $result->fetch_object();
                                ?>
                                    <option value="<?php echo $aux->idFamilia; ?>"><?php echo $aux->idFamilia; ?></option>
                                <?php
                                }
                                ?>
                            <?php
                            } else {
                            ?>
                                <option disabled selected>No hay Familias Registradas...</option>
                            <?php
                            }
                            ?>
                        </select>
                        <a href="../familia/gestionFamilia.php">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </a>
                        <label class="ms-3 my-2 me-2 text-black-50" for="familiaPersona">Por favor seleccione el Número Único de Identificación Familiar (NUIF) que le arrojó el sistema a la hora de registrar su familia.</label>
                    </div>

                    <button onclick="crearPersona();" class="mb-4 btn btn-primary" form="formCreate" type="button">Ingresar Datos</button>
                </form>
            </div>

            <!-- Tabla de Consulta -->
            <div class="col-9">
                <?php
                //Conectamos para obtener la lista de personas
                $query = "SELECT * FROM persona";
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
                                    <center>Nombre</center>
                                </th>
                                <th scope="col">
                                    <center>Apellidos</center>
                                </th>
                                <th scope="col">
                                    <center>Teléfono</center>
                                </th>
                                <th scope="col">
                                    <center>Edad</center>
                                </th>
                                <th scope="col">
                                    <center>Sexo</center>
                                </th>
                                <th scope="col">
                                    <center>Municipio</center>
                                </th>
                                <th scope="col">
                                    <center>Vivienda</center>
                                </th>
                                <th scope="col">
                                    <center>NUIF</center>
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
                                    <form id="formPersona<?php echo $aux->idPersona; ?>" method="POST">
                                        <input type="hidden" name="idPersona" value="<?php echo $aux->idPersona; ?>">
                                        <th class="align-middle" scope="row"><?php echo $i + 1; ?></th>
                                        <td class="align-middle"><input name="nombrePersona" id="nombrePersona" class="form-control" form="formPersona<?php echo $aux->idPersona; ?>" type="text" value="<?php echo $aux->nombrePersona; ?>"></td>
                                        <td class="align-middle"><input name="apellidoPersona" id="apellidoPersona" class="form-control" form="formPersona<?php echo $aux->idPersona; ?>" type="text" value="<?php echo $aux->apellidoPersona; ?>"></td>
                                        <td class="align-middle"><input name="telefonoPersona" id="telefonoPersona" class="form-control" form="formPersona<?php echo $aux->idPersona; ?>" type="number" value="<?php echo $aux->telefonoPersona; ?>"></td>
                                        <td class="align-middle"><input name="edadPersona" id="edadPersona" class="form-control" form="formPersona<?php echo $aux->idPersona; ?>" type="number" value="<?php echo $aux->edadPersona; ?>"></td>
                                        <td class="align-middle">
                                            <select name="sexoPersona" id="sexoPersona" class="form-control" form="formPersona<?php echo $aux->idPersona; ?>">
                                                <option selected value="<?php echo $aux->sexoPersona; ?>">
                                                    <?php if ($aux->sexoPersona === "M") {
                                                        echo "Masculino";
                                                    } elseif ($aux->sexoPersona === "F") {
                                                        echo "Femenino";
                                                    }; ?>
                                                </option>
                                                <option value="M">Masculino</option>
                                                <option value="F">Femenino</option>
                                            </select>
                                        </td>
                                        <td class="align-middle">
                                            <select id="municipioPersona" name="municipioPersona" class="form-select" form="formPersona<?php echo $aux->idPersona; ?>">
                                                <?php
                                                //subQuery  
                                                $subQ = "SELECT * FROM municipio WHERE idMunicipio = '$aux->Municipio_idMunicipio';";
                                                $subR = $conn->query($subQ);
                                                $subA = $subR->fetch_object();

                                                //Consulta Select Municipios
                                                $query = "SELECT * FROM municipio";
                                                $result2 = $conn->query($query);
                                                $numfilas2 = $result2->num_rows;
                                                if ($numfilas2 > 0) {
                                                ?>
                                                    <option selected value="<?php echo $subA->idMunicipio; ?>"><?php echo $subA->nombreMunicipio; ?></option>
                                                    <?php
                                                    for ($j = 0; $j < $numfilas2; $j++) {
                                                        $aux2 = $result2->fetch_object();
                                                    ?>
                                                        <option value="<?php echo $aux2->idMunicipio; ?>"><?php echo $aux2->nombreMunicipio; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php
                                                } else {
                                                ?>
                                                    <option disabled selected>No hay Municipios Registrados...</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="align-middle">
                                            <select id="viviendaPersona" name="viviendaPersona" class="form-select" form="formPersona<?php echo $aux->idPersona; ?>">
                                                <?php
                                                //subQuery  
                                                $subQ = "SELECT * FROM vivienda WHERE idVivienda = '$aux->Habita_idVivienda';";
                                                $subR = $conn->query($subQ);
                                                $subA = $subR->fetch_object();

                                                //Consulta Select Viviendas
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
                                            <select name="familiaPersona" id="familiaPersona" class="form-control" form="formPersona<?php echo $aux->idPersona; ?>">
                                                <?php
                                                //subQuery  
                                                $subQ = "SELECT * FROM familia WHERE idFamilia = '$aux->Familia_idFamilia';";
                                                $subR = $conn->query($subQ);
                                                $subA = $subR->fetch_object();

                                                //Consulta Select familias
                                                $query = "SELECT * FROM familia";
                                                $result2 = $conn->query($query);
                                                $numfilas2 = $result2->num_rows;
                                                if ($numfilas2 > 0) {
                                                ?>
                                                    <option selected value="<?php echo $subA->idFamilia; ?>"><?php echo $subA->idFamilia; ?></option>
                                                    <?php
                                                    for ($j = 0; $j < $numfilas2; $j++) {
                                                        $aux2 = $result2->fetch_object();
                                                    ?>
                                                        <option value="<?php echo $aux2->idFamilia; ?>"><?php echo $aux2->idFamilia; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php
                                                } else {
                                                ?>
                                                    <option disabled selected>No hay Familias Registradas...</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="align-middle"><button onclick="updatePersona(<?php echo $aux->idPersona; ?>);" form="formPersona<?php echo $aux->idPersona; ?>" id="actualizarPersona" class="btn btn-outline-warning btn-sm" type="button">Actualizar</button></td>
                                        <td class="align-middle"><button onclick="deletePersona(<?php echo $aux->idPersona; ?>);" form="formMunicipio<?php echo $aux->idPersona; ?>" id="borrarPersona<?php echo $aux->idPersona; ?>" class="btn btn-outline-danger btn-sm" type="button">Borrar</button></td>
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
                    <h3>Upps... No hay Personas registradas</h3>
                <?php
                }
                cerrarConexion();
                ?>
            </div>

        </div>
    </div>
</body>

<script>
    function updatePersona(idPersona) {
        let nombre = '#formPersona' + idPersona;
        let datos = $(nombre).serialize();
        $.ajax({
            type: "POST",
            url: "updatePersona.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Cambios Guardados con exito");
                    window.location.reload();
                    return 0;
                } else if (r == 2) {
                    alert("Upps ha ocurrido un error al intentar actualizar los datos de la persona, intenta de nuevo");
                }
            }
        });
    }

    function deletePersona(idPersona) {
        let nombre = '#formPersona' + idPersona;
        let datos = $(nombre).serialize();
        $.ajax({
            type: "POST",
            url: "deletePersona.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Cambios Guardados con exito");
                    window.location.reload();
                    return 0;
                } else if (r == 2) {
                    alert("Upps ha ocurrido un error al intentar eliminar la persona, intenta de nuevo");
                }
            }
        });
    }

    function crearPersona() {
        let datos = $("#formCreate").serialize();
        $.ajax({
            type: "POST",
            url: "createPersona.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Cambios Guardados con exito");
                    window.location.reload();
                    return 0;
                } else if (r == 2) {
                    alert("Upps ha ocurrido un error al intentar crear el municipio, intenta de nuevo");
                }
            }
        });
    }
</script>

</html>