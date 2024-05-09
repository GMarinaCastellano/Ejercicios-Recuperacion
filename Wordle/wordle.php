<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wordle</title>
    <style>
        input.letraCorrecta {
            background-color: green;
        }
        input.letraIncorrecta {
            background-color: red;
        }
    </style>
</head>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "wordle";
// Creo la conexión y la guardo en una variable
$conn = new mysqli($servername,$username,$password,$database);
// Verifico la conexión o emito error
if ($conn -> connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// Si no está establecida en el input hidden del formulario la palabra escondida entonces la busco
if (!isset($_POST['palabraEscondida'])) {
    $querypalabraOculta = $conn->query("SELECT palabra FROM palabras ORDER BY RAND() LIMIT 1");
    $palabraOculta = mysqli_fetch_array($querypalabraOculta)[0];
    $puntuacion = 0;
} else {
    $palabraOculta = $_POST['palabraEscondida'];
    $puntuacion = $_POST['puntuacion'];
    $puntuacion ++;
}
// Si está establecido el array letras juntamos las letras y lo comparamos con la palabra oculta
if(isset($_POST['letras'])) {
    $palabraPrueba = "";
    foreach ($_POST['letras'] as $letra) {
        $palabraPrueba .= $letra;
    }
    if(strtolower($_POST['palabraEscondida']) == strtolower($palabraPrueba)) {
        header("Location: winner.php?puntuacion=$puntuacion");
        exit();
    } else {
        foreach ($_POST['letras'] as $posicion => $letra) {
            if (strtolower($letra) == strtolower($_POST['palabraEscondida'][$posicion])) {
                $formato[($posicion)] = "letraCorrecta";
            } else {
                $formato[($posicion)] = "letraIncorrecta";
            }
        }
    }
} else {
    $formato = "";
}

var_export($_POST);
?>
<body>
    <p>
        <?php 
        echo $palabraOculta;
        ?>
    </p>
<form action="wordle.php" method="post">
    <input type="hidden" name="palabraEscondida" value="<?php echo $palabraOculta ?>">
    <input type="hidden" name="puntuacion" value="<?php echo $puntuacion ?>">
    <?php for ($i = 0; $i < strlen($palabraOculta); $i++): ?>
        <input  type="text" class="<?php echo $formato[ $i ];?>" maxlength="1" name="letras[<?php echo $i; ?>]" />
    <?php endfor; ?>
    <input type="submit" value="Probar" />
</form>    
</body>
</html>