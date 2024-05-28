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

$consulta = $conexion->query("SELECT nombre, edad FROM jugadores");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>
</head>
<body>
    <h1>Lista de Jugadores</h1>
    <table >
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($fila = $consulta->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['edad']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <form action="equipos.php" method="get">
        <input type="submit" value="Ir a Equipos">
    </form>
</body>
</html>
<?php
$conexion->close();
?>
