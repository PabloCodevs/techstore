<?php
$host = "localhost/phpmyadmin";
$usuario = "root";
$password = "";
$base_datos = "techstore";

// Crear conexión a la base de datos
$conn = new mysqli($host, $usuario, $password, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
