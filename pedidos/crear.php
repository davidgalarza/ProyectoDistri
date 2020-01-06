<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
include '../utils/db_conecction.php';
$params = $_GET;

$idCliente = $params["idCliente"];
$fecha = $params["fecha"];
$subtotal = $params["subtotal"];
$iva = $params["iva"];
$total = $params["total"];
$idMesa = $params["idMesa"];
$detalles = $params["detalles"];

$sql = "INSERT INTO Pedidos (ID_CLIENTE,
FECHA_HORA,
SUBTOTAL,
IVA,
TOTAL,
ID_MESA,
ESTADO) VALUES ($idCliente, '$fecha', $subtotal, $iva, $total, $idMesa, 'PENDIENTE')";

$correcto = $conn->query($sql);
$idPedido = $conn->insert_id;

$sql = "UPDATE Mesas SET ESTADO = 'OCUPADA' WHERE ID = $idMesa";

$correcto = $conn->query($sql);

$detallesString = explode(",",$detalles);

foreach ($detallesString as $detalle){ 
    $info = explode("-",$detalle);

    $idPlato = $info[0];
    $cantidad = $info[1];
    $subtotal = $info[2];

    $sql = "INSERT INTO Detalle_Pedidos (	
        ID_PLATO,
        CANTIDAD,
        SUBTOTAL,
        ID_PEDIDO) VALUES ($idPlato, $cantidad, $subtotal, $idPedido)";

    $correcto = $conn->query($sql);
} 



$res = array(
    "correcto" => $correcto,
    
);
echo(json_encode($res));