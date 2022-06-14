<?php
try {
    require "../database.php";
    $personaCabezaxFamilia = $_POST['personaCabezaxFamilia'] ?? '';
    $familiaPersona = $_POST['familiaPersona'] ?? '';

    $result = $conn->query("INSERT INTO cabezaxfamilia (`Persona_idPersona`, `Familia_idFamilia`) 
                                            VALUES ('$personaCabezaxFamilia ', '$familiaPersona');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
    echo $e;
}
