<?php
try {
    require "../database.php";
    $subR = $conn->query("SELECT max(idFamilia) AS maxi FROM familia;")->fetch_object();
    $subR = $subR->maxi + 1;

    $result = $conn->query("INSERT INTO familia (idFamilia) VALUES ('$subR');");
    echo $subR;
    cerrarConexion();
} catch (Exception $e) {
    echo -1;
}
