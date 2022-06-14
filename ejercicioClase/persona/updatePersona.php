<?php
try {
    require "../database.php";
    $idPersona = $_POST['idPersona'] ?? '';
    $nombrePersona = $_POST['nombrePersona'] ?? '';
    $apellidoPersona = $_POST['apellidoPersona'] ?? '';
    $telefonoPersona = $_POST['telefonoPersona'] ?? '';
    $edadPersona = $_POST['edadPersona'] ?? '';
    $sexoPersona = $_POST['sexoPersona'] ?? '';
    $municipioPersona = $_POST['municipioPersona'] ?? '';
    $viviendaPersona = $_POST['viviendaPersona'] ?? '';
    $familiaPersona = $_POST['familiaPersona'] ?? '';
    $result = $conn->query("UPDATE persona
                        SET nombrePersona = '$nombrePersona', 
                            apellidoPersona = '$apellidoPersona', 
                            telefonoPersona = '$telefonoPersona',
                            edadPersona = '$edadPersona',
                            sexoPersona = '$sexoPersona', 
                            Municipio_idMunicipio = '$municipioPersona',
                            Habita_idVivienda = '$viviendaPersona',
                            Familia_idFamilia = '$familiaPersona'
                        WHERE (idPersona = '$idPersona');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
