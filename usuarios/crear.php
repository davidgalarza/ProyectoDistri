<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';
$params = $_GET;

$nombre = $params["nombre"];
$apellido = $params["apellido"];
$cedula = $params["cedula"];
$telefono = $params["telefono"];
$perfil = $params["perfil"];
$contrasena = $params["contrasena"];
$passHash = password_hash($contrasena, PASSWORD_DEFAULT);
$sql = "INSERT INTO Usuarios (NOMBRE, APELLIDO, CEDULA, TELEFONO, PERFIL, CONTRASENA) VALUES ('$nombre', '$apellido', '$cedula', '$telefono', '$perfil', '$passHash')";
$correcto = $conn->query($sql);
$res = array(
    "correcto" => $correcto,
);
echo(json_encode($res));