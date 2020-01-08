<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';

$params = $_GET;

$fechaInicio = $params["fechaInicio"];
$fechaFin = $params["fechaFin"];

$sql = "SELECT CAST(FECHA_HORA AS DATE) AS FECHA, SUM(TOTAL) AS TOTALVENDIDO FROM Pedidos
WHERE FECHA_HORA BETWEEN '$fechaInicio' AND '$fechaFin'
GROUP BY CAST(FECHA_HORA AS DATE)";

$sth = $conn->query($sql);
$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}
print json_encode($rows);