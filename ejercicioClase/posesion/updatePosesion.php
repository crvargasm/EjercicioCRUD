<?php
try {
    require "../database.php";
    $idPosesion = $_POST['idPosesion'] ?? '';
    $apoderadoPosesion = $_POST['apoderadoPosesion'] ?? '';
    $direccionPosesion = $_POST['direccionPosesion'] ?? '';
    $result = $conn->query("UPDATE posesion
                        SET Persona_idPersona = '$apoderadoPosesion', 
                        Vivienda_idVivienda = '$direccionPosesion'
                        WHERE (idPosesion = '$idPosesion');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
