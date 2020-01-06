<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';
$params = $_GET;

$id = $params["id"];
$nombre = $params["nombre"];
$precio = $params["precio"];
$descripcion = $params["descripcion"];
$estado = $params["estado"];
$categoria = $params["categoria"];

$sql = "UPDATE Platos SET 
NOMBRE = '$nombre', 
PRECIO = $precio, 
DESCRIPCION = '$descripcion', 
ESTADO = '$estado', 
CATEGORIA = '$categoria'
WHERE ID = $id";
$correcto = $conn->query($sql);
$res = array(
    "correcto" => $correcto,
);
echo(json_encode($res));