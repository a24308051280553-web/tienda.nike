<?php
include("conexion.php");

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $confirmar_password = $_POST['confirmar_password'];

    if ($password !== $confirmar_password) {
        $mensaje = "<p style='color:red; text-align:center;'>Las contraseñas no coinciden.</p>";
    } else {
        $sql_verificar = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $res = $conexion->query($sql_verificar);

        if ($res->num_rows > 0) {
            $mensaje = "<p style='color:red; text-align:center;'>Este correo ya está registrado.</p>";
        } else {
            $sql_insertar = "INSERT INTO usuarios (correo, password) VALUES ('$correo', '$password')";
            if ($conexion->query($sql_insertar) === TRUE) {
                echo "<script>
                        alert('¡Registro exitoso! Ahora puedes iniciar sesión.');
                        window.location.href = 'miketienda.html';
                      </script>";
                exit();
            } else {
                $mensaje = "<p style='color:red; text-align:center;'>Error al registrar: " . $conexion->error . "</p>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>NIKE - Registrarse</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #F8F9FA; color: #0F0F0F; }
        header { background-color: #000000; color: white; text-align: center; padding: 20px; }
        header h1 { margin: 0; letter-spacing: 2px; }
        nav { background-color: #333333; text-align: center; padding: 10px; }
        nav a { color: #E6F0FA; text-decoration: none; margin: 0 15px; font-weight: bold; text-transform: uppercase; font-size: 14px; }
        nav a:hover { color: #ffca28; }
        main { max-width: 450px; margin: 30px auto; background-color: white; padding: 25px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); }
        h2 { color: #000000; border-bottom: 2px solid #000000; padding-bottom: 8px; text-align: center; margin-top: 0; }
        form { background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        form p { margin-bottom: 15px; }
        label { font-weight: bold; font-size: 14px; }
        input[type="email"], input[type="password"] { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"] { background-color: #28a745; color: white; border: none; padding: 12px; border-radius: 4px; cursor: pointer; font-size: 16px; font-weight: bold; width: 100%; }
        input[type="submit"]:hover { background-color: #218838; }
        .login-link { text-align: center; margin-top: 15px; font-size: 14px; }
        .login-link a { color: #000000; font-weight: bold; text-decoration: none; }
        footer { background-color: #333333; color: white; text-align: center; padding: 15px; margin-top: 40px; }
    </style>
</head>
<body>

    <header>
        <h1>NIKE</h1>
        <p>Crea tu cuenta de acceso</p>
    </header>

    <nav>
        <a href="miketienda.html">Inicio</a>
        <a href="calzado.php">Calzado</a>
        <a href="ropa.php">Ropa</a>
    </nav>

    <main>
        <section id="registro">
            <h2>Crear Cuenta</h2>
            <?php echo $mensaje; ?>
            <form action="registro.php" method="POST">
                <p>
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com" required>
                </p>
                <p>
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" placeholder="Crea tu contraseña" required>
                </p>
                <p>
                    <label for="confirmar_password">Confirmar Contraseña:</label>
                    <input type="password" id="confirmar_password" name="confirmar_password" placeholder="Repite tu contraseña" required>
                </p>
                <p style="margin-top: 20px;">
                    <input type="submit" value="Registrarse">
                </p>
            </form>

            <div class="login-link">
                <p>¿Ya tienes cuenta? <a href="miketienda.html">Inicia sesión aquí</a></p>
            </div>
        </section>
    </main>

    <footer>
        <p>Carlos Oziel Hernandez Garcia | 5°I | 0553</p>
    </footer>

</body>
</html>