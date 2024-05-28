<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<?php

use function PHPSTORM_META\type;

$servername = "localhost";
$username = "root";
$password = "";
$database = "liga";
$conexion = new mysqli($servername,$username,$password,$database);
if ($conexion -> connect_error) {
    die("La conexión falla: ".$conexion->connect_error);
}
$nombres = $conexion -> query("SELECT nombre FROM jugadores");
while ($filaNombres = mysqli_fetch_array($nombres)) {
    echo $filaNombres['nombre'];
}
echo "<br>";
$contraseñas = $conexion -> query("SELECT password FROM jugadores");
while ($filaContraseñas = mysqli_fetch_array($contraseñas)) {
    echo $filaContraseñas['password'];
}

if (isset($_POST['nombreUsuario'])) {
    $consultaNombres = $conexion -> query("SELECT * FROM jugadores WHERE nombre='".$_POST['nombreUsuario']."'");
    $nombreRepetido = $consultaNombres->num_rows > 0? true : false;
    $consultaContraseña = $conexion -> query("SELECT * FROM jugadores WHERE password='".$_POST['contraseña']."'");
    $contraseñaRepetida = $consultaContraseña->num_rows > 0 ? true : false;
    if(!$nombreRepetido and !$contraseñaRepetida){
        $usuarioPreparado = "INSERT INTO jugadores (nombre,password,equipo) VALUES ('".$_POST['nombreUsuario']."','".$_POST['contraseña']."','".$_POST['equipo']."')";
        if ($conexion->query($usuarioPreparado) === TRUE) {
            echo "Has creado un nuevo jugador";
            header("Location: login.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
      
}
echo "<br>";
var_export($_POST);
?>
<body>
    <form method="post" action="register_jugador.php">
        <label for="nombreUsuario">Nombre</label>
        <input type="text" name="nombreUsuario" maxlength="20">
        <label for="contraseña">Contraseña</label>
        <input type="password" name="contraseña" maxlength="20" >
        <label for="equipo">N. Equipo</label>
        <input type="text" name="equipo" maxlength="2" >
        <input type="submit" value="Registrar">
    </form>
</body>
</html>