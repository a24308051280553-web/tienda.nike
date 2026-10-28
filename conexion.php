<?php
$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "tienda_nike";

// Crear conexión
$conexion = new mysqli($host, $usuario, $password, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>