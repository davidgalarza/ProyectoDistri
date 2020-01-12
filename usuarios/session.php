<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
include '../utils/db_conecction.php';
$params = $_GET;

$cedula = $params["cedula"];
$contrasena = $params["contrasena"];

$sql = "SELECT CONTRASENA, PERFIL FROM Usuarios WHERE CEDULA = '$cedula'";

$resultado = $conn->query($sql);
$row = mysqli_fetch_assoc($resultado);
if($row){
    $hashContrasena = $row['CONTRASENA'];
    $perfil = $row['PERFIL'];
    $correcto = password_verify ($contrasena , $hashContrasena);
    if($correcto){
        $res = array(
            "correcto" => $correcto,
            "perfil" => $perfil 
        );
    }else{
        $res = array(
            "correcto" => false,
        );
    }

}else{
    $res = array(
        "correcto" => false,
    );
}

echo(json_encode($res));




