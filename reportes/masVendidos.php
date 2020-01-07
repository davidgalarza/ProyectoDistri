<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';

$params = $_GET;

$fechaInicio = $params["fechaInicio"];
$fechaFin = $params["fechaFin"];

$sql = "SELECT  P.*, SUM(DP.SUBTOTAL) AS TOTALVEMDIDO FROM Detalle_Pedidos  DP, Platos P
WHERE ID_PEDIDO IN (
                    SELECT ID 
                    FROM Pedidos 
                    WHERE FECHA_HORA BETWEEN '$fechaInicio' AND '$fechaFin'
                    )
AND P.ID = ID_PLATO
GROUP BY ID_PLATO
ORDER BY SUM(DP.SUBTOTAL) DESC ";
$sth = $conn->query($sql);
$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}
print json_encode($rows);