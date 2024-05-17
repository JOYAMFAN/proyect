<?php

$servername = "localhost";
$database = "cecyte";
$username = "root";
$password = "";

$conexion = mysqli_connect($servername, $username, $password, $database);

if (!$conexion) {
    die("Conexion fallida: <br>" . mysqli_connect_error());
}
?>
