<?php
try {
    require "../database.php";
    $idCabezaFamilia = $_POST['idCabezaFamilia'] ?? '';
    $result = $conn->query("DELETE FROM cabezaxfamilia 
                                WHERE (idCabezaFamilia = '$idCabezaFamilia');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
