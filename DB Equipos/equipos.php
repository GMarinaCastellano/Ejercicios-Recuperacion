<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
</head>
<?php
session_start();
if (!isset($_SESSION['nombreUsuario']) || !isset($_SESSION['contraseña'])) {
    header("Location: login.php");
    exit;
}
$servername = "localhost";
$username = "root";
$password = "";
$database = "liga";

$conexion = new mysqli($servername, $username, $password, $database);

if ($conexion->connect_error) {
    die("La conexión falla: " . $conexion->connect_error);
}

$consulta = $conexion->query("SELECT nombre, lugar FROM equipos");

?>
<body>
    <h1>Lista de Equipos</h1>
    <ol>
        <?php
        while ($fila = $consulta->fetch_assoc()) {
            echo "<li>";
            echo "Nombre: " . htmlspecialchars($fila['nombre']) . ", Lugar: " . htmlspecialchars($fila['lugar']);
            echo "</li>";
        }
        ?>
    </ol>
    <br>
    <form action="equiposCompletos.php" method="post">
        <input type="submit" value="Ver Equipos Completos">
    </form>
</body>
</html>
<?php
$conexion->close();
?>
