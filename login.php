<?php
include("conexion.php");

$correo = $_POST['correo'];
$password = $_POST['password'];

// Consultar usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND password = '$password'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo "<script>
            alert('¡Inicio de sesión exitoso! Bienvenido.');
            window.location.href = 'calzado.php';
          </script>";
} else {
    echo "<script>
            alert('Correo o contraseña incorrectos.');
            window.location.href = 'miketienda.html';
          </script>";
}

$conexion->close();
?>