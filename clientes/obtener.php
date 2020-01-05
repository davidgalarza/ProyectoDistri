<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';

$params = $_GET;

$cedula = $params["cedula"];

$sql = "SELECT * FROM Clientes 
WHERE CEDULA = $cedula";
$sth = $conn->query($sql);

$row = mysqli_fetch_assoc($sth);

print json_encode($row);

