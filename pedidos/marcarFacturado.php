<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';
$params = $_GET;

$idP = $params["idPedido"];
$idM = $params["idMesa"];

$sql = "UPDATE Pedidos SET 
ESTADO = 'FACTURADO'
WHERE ID = $idP";
$correctoP = $conn->query($sql);

$sql = "UPDATE Mesas SET 
ESTADO = 'DISPONIBLE'
WHERE ID = $idM";
$correctoM = $conn->query($sql);



$res = array(
    "correcto" => $correctoP && $correctoM,
);
echo(json_encode($res));