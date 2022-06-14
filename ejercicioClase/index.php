<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron&display=swap">
    <title>Ejercicio Clase</title>
</head>

<body>
    <div class="contaniner">
        <h2 class="mt-3">
            <center>Bienvenidos al CRUD del Ejercicio de Clase</center>
        </h2>
    </div>

    <h5 class="my-5">
        <center>A continuación seleccione la entidad que desea gestionar</center>
    </h5>

    <div class="container my-5">
        <div class="my-5 row justify-content-md-center">
            <div class="col-auto mx-5">
                <a href="municipio/gestionMunicipios.php"><button class="btn btn-warning">Gestión Municipios</button></a>
            </div>
            <div class="col-auto mx-5">
                <a href="persona/gestionPersona.php"><button class="btn btn-warning">Gestión Personas</button></a>
            </div>
            <div class="col-auto mx-5">
                <a href="vivienda/gestionVivienda.php"><button class="btn btn-warning">Gestión Viviendas</button></a>
            </div>
            <div class="col-auto mx-5">
                <a href="posesion/gestionPosesion.php"><button class="btn btn-warning">Gestión Posesiones</button></a>
            </div>
        </div>
        <div class="my-5 row justify-content-md-center">
            <div class="col-auto mx-5">
                <a href="familia/gestionFamilia.php"><button class="btn btn-warning">Gestión Familias</button></a>
            </div>
            <div class="col-auto mx-5">
                <a href="cabezasxfamilia/gestionCabezasxFamilia.php"><button class="btn btn-warning">Gestión Cabeza de Familia</button></a>
            </div>
        </div>
    </div>
</body>

</html>