<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db4";
$conexion = new mysqli($servername,$username,$password,$database);
if ($conexion -> connect_error) {
    die("La conexión falla: ".$conexion->connect_error);
}
$nombrePreparado = $conexion->query("SELECT letra1,letra2,letra3,letra4 FROM nombres4 ");
// $consulta = $conexion->query("SELECT nombre, edad FROM jugadores");


?>
<body>
    <ul>
        <?php
            while ($fila = $nombrePreparado->fetch_assoc()) {
                echo "<li>";
                echo "".htmlspecialchars($fila['letra1']).htmlspecialchars($fila['letra2']).htmlspecialchars($fila['letra3']).htmlspecialchars($fila['letra4'])."";
                echo "</li>";
            }
        ?>
    </ul>
</body>
</html>