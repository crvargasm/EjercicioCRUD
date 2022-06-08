<?php
try {
    require "../database.php";
    $idMunicipio = $_POST['idMunicipio'] ?? '';
    $nombreMunicipio = $_POST['nombreMunicipio'] ?? '';
    $areaMunicipio = $_POST['areaMunicipio'] ?? '';
    $presupuestoMunicipio = $_POST['presupuestoMunicipio'] ?? '';
    $result = $conn->query("UPDATE municipio
                        SET nombreMunicipio = '$nombreMunicipio', 
                            areaMunicipio = '$areaMunicipio', 
                            presupuestoMunicipio = '$presupuestoMunicipio' 
                        WHERE (idMunicipio = '$idMunicipio');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
