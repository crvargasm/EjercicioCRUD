<?php
$hostname = 'localhost';
$username = 'root';
$password = 'Evvmayr0';
$database = 'ejericioclase';
$port = '3306';

$conn = mysqli_connect($hostname, $username, $password, $database, $port);

//testConnection($conn);

function testConnection($conn)
{
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    cerrarConexion();
}

function cerrarConexion()
{
    global $conn;
    mysqli_close($conn);
}
