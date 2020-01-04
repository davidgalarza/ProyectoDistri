<?php
header('Content-Type: application/json');
include '../utils/db_conecction.php';
$params = $_GET;
$id = $params["id"];
$sql = "DELETE FROM Usuarios WHERE ID = $id";
$correcto = $conn->query($sql);
$res = array(
    "correcto" => $correcto,
);
echo(json_encode($res));