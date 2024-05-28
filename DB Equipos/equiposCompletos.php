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

$consultaEquipo = $conexion->query("SELECT id, nombre, lugar FROM equipos");
?>
<body>
    <h1>Lista de Equipos</h1>
    <ul>
        <?php
        while ($fila = $consultaEquipo->fetch_assoc()) {
            echo "<li>";
            echo "Nombre: " . $fila['nombre'] . ", Lugar: " . $fila['lugar'];
            echo "<ul>";
            $equipoID = $fila['id'];
            $consultaJugador = $conexion->query("SELECT nombre, equipo FROM jugadores WHERE equipo=$equipoID");
            while ($filaJugador = $consultaJugador->fetch_assoc()) {
                echo "<li>";
                echo $filaJugador['nombre'];
                echo "</li>";   
            }
            echo "</ul>";
            echo "</li>";

        }
        ?>
    </ul>
    <br>
</body>
</html>
<?php
$conexion->close();
?>
