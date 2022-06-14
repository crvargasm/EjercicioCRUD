<?php
try {
    require "../database.php";
    $idCabezaFamilia = $_POST['idCabezaFamilia'] ?? '';
    $personaCabezaxFamilia = $_POST['personaCabezaxFamilia'] ?? '';
    $familiaPersona = $_POST['familiaPersona'] ?? '';
    $result = $conn->query("UPDATE cabezaxfamilia
                        SET Persona_idPersona = '$personaCabezaxFamilia', 
                        Familia_idFamilia = '$familiaPersona'
                        WHERE (idCabezaFamilia = '$idCabezaFamilia');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
