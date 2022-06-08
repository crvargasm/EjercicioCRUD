<?php

require "..././database.php";
$query = "SELECT * FROM municipio";
$result = $conn->query($query);
$numfilas = $result->num_rows;
if ($numfilas > 0) {
    for ($i = 0; $i < $numfilas; $i++) {
        $aux = $result->fetch_object();
        echo $aux->idMunicipio;
        //...
    }
}
