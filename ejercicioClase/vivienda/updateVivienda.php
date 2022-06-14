<?php
try {
    require "../database.php";
    $idVivienda = $_POST['idVivienda'] ?? '';
    $direccionVivienda = $_POST['direccionVivienda'] ?? '';
    $capacidadVivienda = $_POST['capacidadVivienda'] ?? '';
    $nivelesVivienda = $_POST['nivelesVivienda'] ?? '';
    $municipioVivienda = $_POST['municipioVivienda'] ?? '';
    $result = $conn->query("UPDATE vivienda
                        SET direccionVivienda = '$direccionVivienda', 
                            capacidadVivienda = '$capacidadVivienda', 
                            nivelesVivienda = '$nivelesVivienda',
                            Municipio_idMunicipio = '$municipioVivienda'
                        WHERE (idVivienda = '$idVivienda');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
