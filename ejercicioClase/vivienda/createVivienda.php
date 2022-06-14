<?php
try {
    require "../database.php";
    $direccionVivienda = $_POST['direccionVivienda'] ?? '';
    $capacidadVivienda = $_POST['capacidadVivienda'] ?? '';
    $nivelesVivienda = $_POST['nivelesVivienda'] ?? '';
    $municipioVivienda = $_POST['municipioVivienda'] ?? '';

    $result = $conn->query("INSERT INTO vivienda (`direccionVivienda`, `capacidadVivienda`, `nivelesVivienda`, `Municipio_idMunicipio`) 
                                            VALUES ('$direccionVivienda', '$capacidadVivienda', '$nivelesVivienda', '$municipioVivienda');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
