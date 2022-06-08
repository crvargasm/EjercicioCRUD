<?php
try {
    require "../database.php";
    $nombreMunicipio = $_POST['nombreMunicipio'] ?? '';
    $areaMunicipio = $_POST['areaMunicipio'] ?? '';
    $presupuestoMunicipio = $_POST['presupuestoMunicipio'] ?? '';
    $result = $conn->query("INSERT INTO municipio 
                                       (nombreMunicipio,    areaMunicipio,    presupuestoMunicipio) 
                                VALUES ('$nombreMunicipio', '$areaMunicipio', '$presupuestoMunicipio');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
