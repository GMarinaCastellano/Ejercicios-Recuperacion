<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Atracciones</title>
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
if(isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $nombrePreparado = "INSERT INTO atracciones (tematica) VALUES ('".$nombre."')";
    if ($conexion->query($nombrePreparado) === TRUE) {
        echo "Nombre insertado";
    } else {
        echo "Error: " . $nombrePreparado . "<br>" . $conexion->error;
    }
}
$atraccionConsulta = $conexion->query("SELECT id FROM atracciones ORDER BY id DESC LIMIT 1");
$fila = $atraccionConsulta->fetch_assoc();
$nNuevaAtraccion = $fila['id']+1;
?>
<body>
    <h1>Añadir atracciones</h1>
    <form method="post" action="insertar_atraccion.php" >
        <label for="numeroNuevaAtraccion" >Número de la atracción: </label>
        <input type="text" name="numeroNuevaAtraccion" value="<?php echo $nNuevaAtraccion; ?>" 
        readonly>
        <label for="nombre"> Temática: </label>
        <input type="text" name="nombre" maxlength="20">
        <input type="submit" value="Añadir">
    </form>
</body>
</html>