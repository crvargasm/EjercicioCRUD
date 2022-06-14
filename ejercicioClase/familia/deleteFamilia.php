<?php
try {
    require "../database.php";
    $idFamilia = $_POST['idFamilia'] ?? '';
    $result = $conn->query("DELETE FROM cabezaxfamilia 
                                WHERE (Familia_idFamilia = '$idFamilia');");
    $result = $conn->query("DELETE FROM persona 
                                WHERE (Familia_idFamilia = '$idFamilia');");
    $result = $conn->query("DELETE FROM familia 
                                WHERE (idFamilia = '$idFamilia');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo $e;
}
