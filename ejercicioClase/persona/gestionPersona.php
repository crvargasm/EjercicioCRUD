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
    <div class="container">
        <div class="row">

            <!-- Formulario de Registro -->
            <div class="col-4">
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
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>

                    <div class="input-group my-2">
                        <select id="municipioPersona" name="municipioPersona" class="form-select">
                            <option disabled selected>Seleccione su municipio</option>
                            <option value="1">...</option>
                            <option value="2">...</option>
                        </select>
                        <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>
                    <div class="input-group my-2">
                        <select id="viviendaPersona" name="viviendaPersona" class="form-select">
                            <option disabled selected>Seleccione su vivienda</option>
                            <option value="1">...</option>
                            <option value="2">...</option>
                        </select>
                        <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>

                    <div class="input-group my-2">
                        <select id="familiaPersona" name="familiaPersona" class="form-select">
                            <option disabled selected>Seleccione su familia</option>
                            <option value="1">...</option>
                            <option value="2">...</option>
                        </select>
                        <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>

                    <button onclick="crearMunicipio();" class="btn btn-primary" form="formCreate" type="button">Ingresar Datos</button>
                </form>
            </div>

            <!-- Tabla de Consulta -->
            <div class="col-8">
                <?php
                //Conectamos para obtener la lista de personas
                require "../database.php";
                $query = "SELECT * FROM municipio";
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
                                    <center>Área (km<sup>2</sup>)</center>
                                </th>
                                <th scope="col">
                                    <center>Presupuesto (COP)</center>
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
                                    <form id="formMunicipio<?php echo $aux->idMunicipio; ?>" method="POST">
                                        <input type="hidden" name="idMunicipio" value="<?php echo $aux->idMunicipio; ?>">
                                        <th class="align-middle" scope="row"><?php echo $i + 1; ?></th>
                                        <td class="align-middle"><input name="nombreMunicipio" id="nombreMunicipio" class="form-control" form="formMunicipio<?php echo $aux->idMunicipio; ?>" type="text" value="<?php echo $aux->nombreMunicipio; ?>"></td>
                                        <td class="align-middle"><input name="areaMunicipio" id="areaMunicipio" class="form-control" form="formMunicipio<?php echo $aux->idMunicipio; ?>" type="number" value="<?php echo $aux->areaMunicipio; ?>"></td>
                                        <td class="align-middle"><input name="presupuestoMunicipio" id="presupuestoMunicipio" class="form-control" form="formMunicipio<?php echo $aux->idMunicipio; ?>" type="number" value="<?php echo $aux->presupuestoMunicipio; ?>"></td>
                                        <td class="align-middle"><button onclick="updateMunicipio(<?php echo $aux->idMunicipio; ?>);" form="formMunicipio<?php echo $aux->idMunicipio; ?>" id="actualizarMunicipio" class="btn btn-outline-warning btn-sm" type="button">Actualizar</button></td>
                                        <td class="align-middle"><button onclick="deleteMunicipio(<?php echo $aux->idMunicipio; ?>);" id="borrarMunicipio<?php echo $aux->idMunicipio; ?>" form="formMunicipio<?php echo $aux->idMunicipio; ?>" class="btn btn-outline-danger btn-sm" type="button">Borrar</button></td>
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
    function updateMunicipio(idMunicipio) {
        let nombre = '#formMunicipio' + idMunicipio;
        let datos = $(nombre).serialize();
        $.ajax({
            type: "POST",
            url: "updateMunicipio.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Cambios Guardados con exito");
                    window.location.reload();
                    return 0;
                } else if (r == 2) {
                    alert("Upps ha ocurrido un error al intentar actualizar el municipio, intenta de nuevo");
                }
            }
        });
    }

    function deleteMunicipio(idMunicipio) {
        let nombre = '#formMunicipio' + idMunicipio;
        let datos = $(nombre).serialize();
        $.ajax({
            type: "POST",
            url: "deleteMunicipio.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Cambios Guardados con exito");
                    window.location.reload();
                    return 0;
                } else if (r == 2) {
                    alert("Upps ha ocurrido un error al intentar eliminar el municipio, intenta de nuevo");
                }
            }
        });
    }

    function crearMunicipio() {
        let datos = $("#formCreate").serialize();
        $.ajax({
            type: "POST",
            url: "createMunicipio.php",
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