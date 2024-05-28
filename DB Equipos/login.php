<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "liga";

$conexion = new mysqli($servername, $username, $password, $database);

if ($conexion->connect_error) {
    die("La conexión falla: " . $conexion->connect_error);
}

if (isset($_POST['nombreUsuario']) && isset($_POST['contraseña'])) {
    $nombreUsuario = $conexion->real_escape_string($_POST['nombreUsuario']);
    $contraseña = $conexion->real_escape_string($_POST['contraseña']);

    $consulta = $conexion->query("SELECT * FROM jugadores WHERE nombre='$nombreUsuario' AND password='$contraseña'");

    if ($consulta->num_rows > 0) {
        $_SESSION['nombreUsuario'] = $nombreUsuario;
        $_SESSION['contraseña'] = $contraseña;
        header("Location: jugadores.php");
        exit;
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
<body>
    <form method="post" action="login.php">
        <label for="nombreUsuario">Nombre de usuario</label>
        <input type="text" name="nombreUsuario" maxlength="20" required>
        <label for="contraseña">Contraseña</label>
        <input type="password" name="contraseña" maxlength="20" required>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
