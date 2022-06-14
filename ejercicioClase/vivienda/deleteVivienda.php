<?php
try {
    require "../database.php";
    $idVivienda = $_POST['idVivienda'] ?? '';
    $result = $conn->query("DELETE FROM cabezaxfamilia 
                                WHERE Persona_idPersona IN (SELECT idPersona FROM persona 
                                                                WHERE Habita_idVivienda= '$idVivienda');");
    $result = $conn->query("DELETE FROM posesion 
                                WHERE (Vivienda_idVivienda = '$idVivienda');");
    $result = $conn->query("DELETE FROM persona 
                                    WHERE (Habita_idVivienda = '$idVivienda');");
    $result = $conn->query("DELETE FROM vivienda 
                                WHERE (idVivienda = '$idVivienda');");
    cerrarConexion();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
