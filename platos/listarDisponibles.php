<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';


$sql = "SELECT * FROM Platos WHERE ESTADO = 'DISPONIBLE'";
$sth = $conn->query($sql);
$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}
print json_encode($rows);