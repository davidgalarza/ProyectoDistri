<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';


$sql = "SELECT ID, NOMBRE, APELLIDO, CEDULA, TELEFONO, PERFIL FROM Usuarios";
$sth = $conn->query($sql);
$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}
print json_encode($rows);