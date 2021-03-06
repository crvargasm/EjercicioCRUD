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
                    <center>Bienvenidos al Gestor de Viviendas</center>
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
                        <input id="direccionVivienda" name="direccionVivienda" class="form-control" type="text" placeholder="Ingrese Direccion de la Vivienda">
                    </div>

                    <div class="input-group my-2">
                        <input id="capacidadVivienda" name="capacidadVivienda" class="form-control me-1" type="number" placeholder="Capacidad de la Vivienda">
                        <input id="nivelesVivienda" name="nivelesVivienda" class="form-control" type="number" placeholder="Niveles de la Vivienda">
                    </div>

                    <!--Select Municipio-->
                    <div class="input-group my-2">
                        <label class="ms-3 my-2 me-2 text-black-50" for="municipioVivienda">Para registrarse debe pasar por Gestion Municipio y registrar el Municipio para poder visualizar su Municipio.</label>
                        <select id="municipioVivienda" name="municipioVivienda" class="form-select">
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

                    <button onclick="crearVivienda();" class="mb-4 btn btn-primary" form="formCreate" type="button">Ingresar Datos</button>
                </form>
            </div>

            <!-- Tabla de Consulta -->
            <div class="col-9">
                <?php
                //Conectamos para obtener la lista de personas
                $query = "SELECT * FROM vivienda";
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
                                    <center>Direcci??n</center>
                                </th>
                                <th scope="col">
                                    <center>Capacidad</center>
                                </th>
                                <th scope="col">
                                    <center>Niveles</center>
                                </th>
                                <th scope="col">
                                    <center>Municipio</center>
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
                                    <form id="formVivienda<?php echo $aux->idVivienda; ?>" method="POST">
                                        <input type="hidden" name="idVivienda" value="<?php echo $aux->idVivienda; ?>">
                                        <th class="align-middle" scope="row"><?php echo $i + 1; ?></th>
                                        <td class="align-middle"><input name="direccionVivienda" id="direccionVivienda" class="form-control" form="formVivienda<?php echo $aux->idVivienda; ?>" type="text" value="<?php echo $aux->direccionVivienda; ?>"></td>
                                        <td class="align-middle"><input name="capacidadVivienda" id="capacidadVivienda" class="form-control" form="formVivienda<?php echo $aux->idVivienda; ?>" type="number" value="<?php echo $aux->capacidadVivienda; ?>"></td>
                                        <td class="align-middle"><input name="nivelesVivienda" id="nivelesVivienda" class="form-control" form="formVivienda<?php echo $aux->idVivienda; ?>" type="number" value="<?php echo $aux->nivelesVivienda; ?>"></td>
                                        <td class="align-middle">
                                            <select id="municipioVivienda" name="municipioVivienda" class="form-select" form="formVivienda<?php echo $aux->idVivienda; ?>">
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
                                        <td class="align-middle"><button onclick="updateVivienda(<?php echo $aux->idVivienda; ?>);" form="formVivienda<?php echo $aux->idVivienda; ?>" id="actualizarPersona" class="btn btn-outline-warning btn-sm" type="button">Actualizar</button></td>
                                        <td class="align-middle"><button onclick="deleteVivienda(<?php echo $aux->idVivienda; ?>);" form="formVivienda<?php echo $aux->idVivienda; ?>" id="borrarPersona<?php echo $aux->idVivienda; ?>" class="btn btn-outline-danger btn-sm" type="button">Borrar</button></td>
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
                    <h3>Upps... No hay Viviendas registradas</h3>
                <?php
                }
                cerrarConexion();
                ?>
            </div>

        </div>
    </div>
</body>

<script>
    function updateVivienda(idVivienda) {
        let nombre = '#formVivienda' + idVivienda;
        let datos = $(nombre).serialize();
        $.ajax({
            type: "POST",
            url: "updateVivienda.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Cambios Guardados con exito");
                    window.location.reload();
                    return 0;
                } else if (r == 2) {
                    alert("Upps ha ocurrido un error al intentar actualizar los datos de la vivienda, intenta de nuevo");
                }
            }
        });
    }

    function deleteVivienda(idVivienda) {
        let nombre = '#formVivienda' + idVivienda;
        let datos = $(nombre).serialize();
        if (confirm("A continuaci??n vas a proceder a borrar tanto la vivienda, como las personas que la habitan (incluyendo la Cabeza de Familia registrada y la posesion). \n ??Seguro que deseas continuar?")) {
            $.ajax({
                type: "POST",
                url: "deleteVivienda.php",
                data: datos,
                success: function(r) {
                    if (r == 1) {
                        alert("Cambios Guardados con exito");
                        window.location.reload();
                        return 0;
                    } else if (r == 2) {
                        alert("Upps ha ocurrido un error al intentar eliminar la vivienda, intenta de nuevo");
                    }
                }
            });
        }
    }

    function crearVivienda() {
        let datos = $("#formCreate").serialize();
        $.ajax({
            type: "POST",
            url: "createVivienda.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Cambios Guardados con exito");
                    window.location.reload();
                    return 0;
                } else if (r != 1) {
                    alert("Upps ha ocurrido un error al intentar registrar la Vivienda, intenta de nuevo");
                }
            }
        });
    }
</script>

</html>