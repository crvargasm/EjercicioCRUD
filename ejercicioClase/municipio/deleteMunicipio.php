<?php
try {
    require "../database.php";
    $idMunicipio = $_POST['idMunicipio'] ?? '';
    $result = $conn->query("DELETE FROM municipio 
                                WHERE (idMunicipio = '$idMunicipio');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
