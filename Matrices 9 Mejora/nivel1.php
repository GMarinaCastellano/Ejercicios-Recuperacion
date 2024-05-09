<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nivel 1</title>
</head>
<?php 
$numeros = [];
foreach ($numeros as $numero) {
    if (isset($_POST['numero'])) {
        $_POST['puntosActuales'] += $_POST['valores[numero]'];
    }
}
if (!isset($_POST['valores']) ) {
    $oportunidades = 0;
    $puntosActuales = 0;
    foreach ($valores as $valor) {
        $_POST['valor'] = rand(1,9);
    }
} else {
    $valores = $_POST['valores'];
    $puntosActuales = $_POST['puntosActuales'];
    $oportunidades = $_POST['oportunidades'];
    $oportunidades += 1;
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
var_export($_POST)
?>
<body>
    <form action="nivel1.php" method="post" >
        <p>Oportunidades <?php echo $oportunidades ?> de 3</p>
        <input type="hidden" name="puntosActuales" value="<?php echo $puntosActuales ?>">
        <input type="hidden" name="oportunidades" value="<?php echo $oportunidades ?>">
        <?php foreach ($valores as $indice => $valor): ?>
            <input type="hidden" name="valores[<?php echo $indice ?>]" value="<?php echo $valor ?>">
        <?php endforeach; ?>
        <?php for ($i = 0; $i < 9; $i++): ?>
            <button type="submit" name="numeros[<?php echo $i ?>]"><?php echo $valores[$i] ?></button>
            <?php if (($i + 1) % 3 == 0): ?>
                <br>
            <?php endif; ?>
        <?php endfor; ?>
        <p>Puntos actuales <?php echo $puntosActuales ?></p>
    </form>
</body>
</html>
