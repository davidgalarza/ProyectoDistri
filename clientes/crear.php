<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';
$params = $_GET;

$nombre = $params["nombre"];
$apellido = $params["apellido"];
$direccion = $params["direccion"];
$telefono = $params["telefono"];
$cedula = $params["cedula"];

$sql = "INSERT INTO Clientes (NOMBRE,
APELLIDO,
DIRECCION,
TELEFONO,
CEDULA) VALUES ('$nombre', '$apellido', '$direccion', '$telefono', '$cedula')";
$correcto = $conn->query($sql);
$res = array(
    "correcto" => $correcto,
);
echo(json_encode($res));