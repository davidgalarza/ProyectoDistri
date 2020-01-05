<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';
$params = $_GET;

$nombre = $params["nombre"];
$precio = $params["precio"];
$descripcion = $params["descripcion"];
$estado = $params["estado"];
$categoria = $params["categoria"];

$sql = "INSERT INTO Platos (NOMBRE, PRECIO, DESCRIPCION, ESTADO, CATEGORIA) VALUES ('$nombre', $precio, '$descripcion', '$estado', '$categoria')";
$correcto = $conn->query($sql);
$res = array(
    "correcto" => $correcto,
);
echo(json_encode($res));