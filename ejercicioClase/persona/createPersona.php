<?php
try {
    require "../database.php";
    $nombrePersona = $_POST['nombrePersona'] ?? '';
    $apellidoPersona = $_POST['apellidoPersona'] ?? '';
    $telefonoPersona = $_POST['telefonoPersona'] ?? '';
    $edadPersona = $_POST['edadPersona'] ?? '';
    $sexoPersona = $_POST['sexoPersona'] ?? '';
    $municipioPersona = $_POST['municipioPersona'] ?? '';
    $viviendaPersona = $_POST['viviendaPersona'] ?? '';
    $familiaPersona = $_POST['familiaPersona'] ?? '';

    $result = $conn->query("INSERT INTO persona (`nombrePersona`, `apellidoPersona`, `telefonoPersona`, `edadPersona`, `sexoPersona`, `Familia_idFamilia`, `Habita_idVivienda`, `Municipio_idMunicipio`) 
                                            VALUES ('$nombrePersona ', '$apellidoPersona', '$telefonoPersona', '$edadPersona', '$sexoPersona', '$familiaPersona', '$viviendaPersona', '$municipioPersona');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
