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

/* $arrayComprobar = ["uno","dos","tres"];
$arrayDeArray = ["primer"=>$arrayComprobar];
while ($arrayDeArray) {
    echo $arrayDeArray['primer'];
}*/
if (isset($_POST['nombreUsuario'])) {
    $nombreRepetido = in_array($_POST['nombreUsuario'],mysqli_fetch_array($nombres));
    $contraseñaRepetida =  in_array($_POST['contraseña'],mysqli_fetch_array($contraseñas));
    $usuarioPreparado = "INSERT INTO jugadores (nombre,password) VALUES ('".$_POST['nombreUsuario']."','".$_POST['contraseña']."')";
    
}
/* if ( !$nombreRepetido && !$contraseñaRepetida) {
    ;
} */
?>
<body>
    <form method="post" action="register_jugador.php">
        <input type="text" name="nombreUsuario" maxlength="20">
        <input type="password" name="contraseña" maxlength="20" >
        <input type="submit" value="Registrar">
    </form>
    
</body>
</html>