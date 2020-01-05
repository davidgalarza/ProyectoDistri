<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';
$params = $_GET;

$clienteId = $params["clienteId"];
$fecha = $params["fecha"];
$subtotal = $params["subtotal"];
$iva = $params["iva"];
$total = $params["total"];
$idMesa = $params["idMesa"];

$sql = "INSERT INTO Pedidos (ID_CLIENTE
FECHA_HORA,
SUBTOTAL,
IVA,
TOTAL,
ID_MESA,
ESTADO) VALUES ($clienteId, '$fecha', $subtotal, $iva, $total, $idMesa, 'PENDIENTE')";
$correcto = $conn->query($sql);
$res = array(
    "correcto" => $correcto,
);
echo(json_encode($res));