<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Atracciones</title>
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
echo "<br>";
if(isset($_POST['numeroAtraccion'])) {
    $nombre = $_POST['numeroAtraccion'];
    $nombrePreparado = "DELETE FROM atracciones WHERE id = '".$_POST['numeroAtraccion']."'";
    if ($conexion->query($nombrePreparado) === TRUE) {
    } else {
        echo "Error: " . $nombrePreparado . "<br>" . $conexion->error;
    }
}
?>
<body>
    <h1>Eliminar Atracción</h1>
    <form method="post" action="eliminar_atraccion.php" >
        <label for="numeroAtraccion" >Número de la atracción: </label>
        <input type="text" name="numeroAtraccion">
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>