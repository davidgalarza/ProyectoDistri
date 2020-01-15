<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';
$params = $_GET;

$nombre = $params["nombre"];
$apellido = $params["apellido"];
$direccion = $params["direccion"];
$telefono = $params["telefono"];
$cedula = $params["cedula"];

$sql = "UPDATE Clientes SET 
NOMBRE = '$nombre', 
APELLIDO = '$apellido', 
DIRECCION = '$direccion', 
TELEFONO = '$telefono'
WHERE CEDULA = '$cedula'";
$correcto = $conn->query($sql);
$res = array(
    "correcto" => $correcto,
);
echo(json_encode($res));