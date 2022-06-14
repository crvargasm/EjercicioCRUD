<?php
try {
    require "../database.php";
    $idMunicipio = $_POST['idMunicipio'] ?? '';
    $result = $conn->query("DELETE FROM posesion 
                                WHERE Persona_idPersona IN (SELECT idPersona FROM persona 
                                                                    WHERE Municipio_idMunicipio='$idMunicipio');");
    $result = $conn->query("DELETE FROM cabezaxfamilia 
                                WHERE Persona_idPersona IN (SELECT idPersona FROM persona 
                                                                    WHERE Municipio_idMunicipio='$idMunicipio');");
    $result = $conn->query("DELETE FROM persona 
                                WHERE (Municipio_idMunicipio = '$idMunicipio');");
    $result = $conn->query("DELETE FROM vivienda 
                                WHERE (Municipio_idMunicipio = '$idMunicipio');");
    $result = $conn->query("DELETE FROM municipio 
                                WHERE (idMunicipio = '$idMunicipio');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
    echo $e;
}
