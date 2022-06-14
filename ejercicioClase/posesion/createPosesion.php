<?php
try {
    require "../database.php";
    $personaPosesion = $_POST['personaPosesion'] ?? '';
    $viviendaPersona = $_POST['viviendaPersona'] ?? '';

    $result = $conn->query("INSERT INTO posesion (`Persona_idPersona`, `Vivienda_idVivienda`) 
                                            VALUES ('$personaPosesion ', '$viviendaPersona');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
    echo $e;
}
