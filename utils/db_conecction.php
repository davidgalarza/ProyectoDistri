<?php
    $servername = "localhost";
    //$username = "root";
    //$password = "root";
    $username = "id12128719_root";
    $password = "root1234";
    $database = "id12128719_restaurante";
    // $database = "Restaurante"; // La buena es Restaurante

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>