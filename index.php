<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Require composer autoload file
require "./vendor/autoload.php";

// Require the main WaterPipe class
use ElementaryFramework\WaterPipe\WaterPipe;

// Require the Request class
use ElementaryFramework\WaterPipe\HTTP\Request\Request;
// Require the Response class
use ElementaryFramework\WaterPipe\HTTP\Response\Response;

// Create the base pipe
$basePipe = new WaterPipe;

// Handle any kind of requests made at the root of the pipe
$basePipe->request("", function (Request $req, Response $res) {
    include './utils/db_conecction.php';
    $params = $req->getParams();
    
    $nombre = $params["nombre"];
    $apellido = $params["apellido"];
    $cedula = $params["cedula"];
    $telefono = $params["telefono"];
    $perfil = $params["perfil"];
    $contrasena = $params["contrasena"];
    
    $sql = "INSERT INTO Usuarios (NOMBRE, APELLIDO, CEDULA, TELEFONO, PERFIL, CONTRASENA) VALUES ('$nombre', '$apellido', '$cedula', '$telefono', '$perfil', '$contrasena')";
    $correcto = $conn->query($sql);

    $res->sendJSON(array(
        "correcto" => $correcto,
    ));
});

// Run the pipe and serve the API
$basePipe->run();
?>