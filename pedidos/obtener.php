<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';

$params = $_GET;

$idMesa = $params["idMesa"];

$sql = "SELECT * FROM Pedidos 
WHERE ESTADO = 'PENDIENTE'
&& ID_MESA = $idMesa";
$sth = $conn->query($sql);

$row = mysqli_fetch_assoc($sth);
if($row){
    $row['FECHA'] = $row['FECHA_HORA'];
    $row['IDMESA'] = $row['ID_MESA'];
    $row['NUMEROFACTUTA'] = $row['NUMERO_FACTUTA']; 
    // Obtener cliente
    $idCliente = $row['ID_CLIENTE'];
    $sql = "SELECT * FROM Clientes 
    WHERE ID = $idCliente";
    $res = $conn->query($sql);
    $rowC = mysqli_fetch_assoc($res);
    $row['CLIENTE'] = $rowC;

    // Obtener Detalles
    $idPedido = $row['ID'];

    $sql = "SELECT * FROM Detalle_Pedidos WHERE ID_PEDIDO = $idPedido";
    $sth = $conn->query($sql);
    $rowsD = array();
    while($r = mysqli_fetch_assoc($sth)) {
        
        // Obtener cliente
        $idPlato= $r['ID_PLATO'];
        $sql = "SELECT * FROM Platos 
        WHERE ID = $idPlato";
        $res = $conn->query($sql);
        $rowP = mysqli_fetch_assoc($res);
        $r['PLATO'] = $rowP;
        $rowsD[] = $r;
    }

    $row['DETALLES'] = $rowsD;

    print json_encode($row);
} else {
    print "NADA";
}
