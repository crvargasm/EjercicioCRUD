<?php
try {
    require "../database.php";
    $idPosesion = $_POST['idPosesion'] ?? '';
    $result = $conn->query("DELETE FROM posesion 
                                WHERE (idPosesion = '$idPosesion');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
