<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nivel 1</title>
</head>
<?php 
if (isset($_POST['numero1'])) {
    $_POST['puntosActuales'] += $_POST['n1'];
}
if (isset($_POST['numero2'])) {
    $_POST['puntosActuales'] += $_POST['n2'];
}
if (isset($_POST['numero3'])) {
    $_POST['puntosActuales'] += $_POST['n3'];
}
if (isset($_POST['numero4'])) {
    $_POST['puntosActuales'] += $_POST['n4'];
}
if (isset($_POST['numero5'])) {
    $_POST['puntosActuales'] += $_POST['n5'];
}
if (isset($_POST['numero6'])) {
    $_POST['puntosActuales'] += $_POST['n6'];
}
if (isset($_POST['numero7'])) {
    $_POST['puntosActuales'] += $_POST['n7'];
}
if (isset($_POST['numero8'])) {
    $_POST['puntosActuales'] += $_POST['n8'];
}
if (isset($_POST['numero9'])) {
    $_POST['puntosActuales'] += $_POST['n9'];
}
if (!isset($_POST['n1']) ) {
    $oportunidades = 0;
    $puntosActuales = 0;
    asignarNumeros();echo 1;
} else {
    $puntosActuales = $_POST['puntosActuales'];
    $oportunidades = $_POST['oportunidades'];
    $oportunidades += 1;
}
function asignarNumeros(){
    $_POST['n1'] = rand(1,9);
    $_POST['n2'] = rand(1,9);
    $_POST['n3'] = rand(1,9);
    $_POST['n4'] = rand(1,9);
    $_POST['n5'] = rand(1,9);
    $_POST['n6'] = rand(1,9);
    $_POST['n7'] = rand(1,9);
    $_POST['n8'] = rand(1,9);
    $_POST['n9'] = rand(1,9);
}

if ($oportunidades == 3) {
    if ($puntosActuales >= 15) {
        header('Location: nivel2.php');
        exit;
    } else {
        header('Location: gameover.php');
        exit;
    }
}
?>
<body>
    <form action="nivel1.php" method="post" >
        <p>Oportunidades <?php echo $oportunidades ?> de 3</p>
        <input type="hidden" name="puntosActuales" value="<?php echo $puntosActuales ?>">
        <input type="hidden" name="oportunidades" value="<?php echo $oportunidades ?>">
        <input type="hidden" name="n1" value="<?php echo $_POST['n1'] ?>">
        <input type="hidden" name="n2" value="<?php echo $_POST['n2'] ?>">
        <input type="hidden" name="n3" value="<?php echo $_POST['n3'] ?>">
        <input type="hidden" name="n4" value="<?php echo $_POST['n4'] ?>">
        <input type="hidden" name="n5" value="<?php echo $_POST['n5'] ?>">
        <input type="hidden" name="n6" value="<?php echo $_POST['n6'] ?>">
        <input type="hidden" name="n7" value="<?php echo $_POST['n7'] ?>">
        <input type="hidden" name="n8" value="<?php echo $_POST['n8'] ?>">
        <input type="hidden" name="n9" value="<?php echo $_POST['n9'] ?>">
        <input type="submit" name="numero1" value=""> 
        <input type="submit" name="numero2" value=""> 
        <input type="submit" name="numero3" value=""> 
        <br>
        <input type="submit" name="numero4" value=""> 
        <input type="submit" name="numero5" value=""> 
        <input type="submit" name="numero6" value="">
        <br> 
        <input type="submit" name="numero7" value=""> 
        <input type="submit" name="numero8" value=""> 
        <input type="submit" name="numero9" value=""> 
        <p>Puntos actuales <?php echo $puntosActuales ?></p>
    </form>
</body>
</html>