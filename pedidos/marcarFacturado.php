<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';
$params = $_GET;

$idP = $params["idPedido"];
$idM = $params["idMesa"];

$sql = "SELECT * FROM Pedidos 
order by id desc limit 1";
$sth = $conn->query($sql);

$pedidoInfo = mysqli_fetch_assoc($sth);

$numero = $pedidoInfo['NUMERO_FACTUTA'];

if(!$numero){
    $numero = "001-001-000000001";
}else{
    $nums = explode("-",$numero);
    $num = (int)$nums[2];
    
    $numS= str_pad($num+1, 9 , '0' , STR_PAD_LEFT);
    $numero = "001-001-".$numS;
}



$sql = "UPDATE Pedidos SET 
ESTADO = 'FACTURADO',
NUMERO_FACTUTA = '$numero'
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