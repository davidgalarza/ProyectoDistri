<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';
$params = $_GET;

$cedula = $params["cedula"];
$contrasena = $params["contrasena"];

$sql = "SELECT CONTRASENA FROM USUARIOS WHERE CEDULA = '$cedula'";
$resultado = $conn->query($sql);

$hashContrasena = $row['CONTRASENA'];

echo $hashContrasena;


