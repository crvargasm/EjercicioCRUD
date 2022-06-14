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
                    <center>Bienvenidos al Gestor de Familias</center>
                </h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">

            <!-- Formulario de Registro -->
            <div class="col-4">
                <h3 class="mb-3">Presione el botón para obtener su NUIF:</h3>
                <form id="formCreate" method="POST">
                    <button onclick="crearFamilia();" class="my-2 btn btn-primary" form="formCreate" type="button">Obtener NUIF</button>
                </form>
            </div>

            <!-- Formulario de Eliminación -->
            <div class="col-4">
                <h3 class="mb-3">Para Eliminar su Familia, Por Favor Ingrese su NUIF:</h3>
                <form id="formDelete" method="POST">
                    <input class="form-control my-2" type="number" name="idFamilia" id="idFamilia" form="formDelete">
                    <button onclick="deleteFamilia();" class="my-2 btn btn-danger" form="formDelete" type="button">Eliminar NUIF</button>
                </form>
            </div>

        </div>
    </div>
</body>

<script>
    function deleteFamilia(idFamilia) {
        let nombre = '#formDelete';
        let datos = $(nombre).serialize();

        if (confirm("A continuación vas a proceder a borrar tanto la familia, como las personas que las conforman (incluyendo la Cabeza de Familia registrada y las posesiones). \n ¿Seguro que deseas continuar?")) {
            $.ajax({
                type: "POST",
                url: "deleteFamilia.php",
                data: datos,
                success: function(r) {
                    if (r == 1) {
                        alert("Cambios Guardados con exito");
                        window.location.reload();
                        return 0;
                    } else if (r != 1) {
                        alert("Upps ha ocurrido un error al intentar eliminar la Familia, intenta de nuevo");
                        alert(r)
                    }
                }
            });
        }
    }

    function crearFamilia() {
        let datos = $("#formCreate").serialize();
        $.ajax({
            type: "POST",
            url: "createFamilia.php",
            data: datos,
            success: function(r) {
                if (r > 0) {
                    alert("Familia registrada con exito, a continuación busca un papel...");
                    alert("Advertencia: Tu NUIF es el número \n" + r + "\nPor favor anotalo en un papel dado que es un identificador ÚNICO sin posibilidad de ser rastreado");
                    window.location.reload();
                    return 0;
                } else {
                    alert("Upps ha ocurrido un error al intentar crear la familia, intenta de nuevo");
                }
            }
        });
    }
</script>

</html>