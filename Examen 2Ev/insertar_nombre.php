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
$nombre = $_POST['nombre'];
echo $nombre[1];
echo "<br>";
if(isset($_POST['nombre'])) {
    for ($i = 0; $i < 4; $i++) {
        $nombrePreparado = "INSERT INTO letras (letra) VALUES ('".$nombre[$i]."')";
        if ($conexion->query($nombrePreparado) === TRUE) {
            echo "Nombre insertado";
        } else {
            echo "Error: " . $nombrePreparado . "<br>" . $conexion->error;
        }
    }
    $nombrePreparado = "INSERT INTO nombres4 (letra1, letra2, letra3, letra4) VALUES ('".$nombre[0]."','".$nombre[1]."','".$nombre[2]."','".$nombre[3]."')";
    if ($conexion->query($nombrePreparado) === TRUE) {
        echo "Nombre insertado";
    } else {
        echo "Error: " . $nombrePreparado . "<br>" . $conexion->error;
    }
    $nombrePreparado = "INSERT INTO iniciales (inicial) VALUES ('".$nombre[0]."')";
    if ($conexion->query($nombrePreparado) === TRUE) {
        echo "Nombre insertado";
    } else {
        echo "Error: " . $nombrePreparado . "<br>" . $conexion->error;
    }
}
var_export($_POST);
?>
<body>
<form method="post" action="insertar_nombre.php">
    <input type="text" name="nombre" maxlength="4" minlength="4">
    <input type="submit" value="Insertar nombre">
</form>
<a href="ver_nombre.php"><button>Ver nombres</button></a>
</body>
</html>