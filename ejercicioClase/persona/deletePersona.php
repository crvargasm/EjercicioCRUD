<?php
try {
    require "../database.php";
    $idPersona = $_POST['idPersona'] ?? '';
    $result = $conn->query("DELETE FROM persona 
                                WHERE (idPersona = '$idPersona');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
