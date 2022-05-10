<?php
$server = "localhost";
$username = "root";
$password = "Evvmayr0";
$database = "ejercicioclase";

$conn = mysqli_connect($server, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $cone->connect_error);
}
//echo "Connected successfully";

function cerrarConexion()
{
    global $conn;
    mysqli_close($conn);
}
