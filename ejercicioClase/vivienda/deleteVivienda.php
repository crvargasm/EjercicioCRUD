<?php
try {
    require "../database.php";
    $idVivienda = $_POST['idVivienda'] ?? '';
    $result = $conn->query("DELETE FROM vivienda 
                                WHERE (idVivienda = '$idVivienda');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
