<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atracciones</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "parque_de_atracciones";
$conexion = new mysqli($servername,$username,$password,$database);
if ($conexion -> connect_error) {
    die("La conexión falla: ".$conexion->connect_error);
}
$atraccionConsulta = $conexion->query("SELECT id,tematica FROM atracciones ");
?>

<body>
<div class="container">
<div class="row align-items-start">
    <div class="col">
        <h1>Atracciones</h1>
        <ul>
            <?php
                while ($fila = $atraccionConsulta->fetch_assoc()) {
                    echo "<li>";
                    echo "Atracción nº ".htmlspecialchars($fila['id'])." de temática ".
                    htmlspecialchars($fila['tematica'])."";
                    echo "</li>";
                } 
            ?>
        </ul>    
    </div>
</div>
</div>
</body>
</html>