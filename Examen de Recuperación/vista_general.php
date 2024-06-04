<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista General</title>
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
$visitanteConsulta = $conexion->query("SELECT id,edad FROM visitantes ");
$viajeConsulta = $conexion->query("SELECT id,nViajeros,hora,idAtraccion FROM viajes ");
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
    <div class="col">
        <h1>Visitantes</h1>
        <ul>
            <?php
                while ($fila = $visitanteConsulta->fetch_assoc()) {
                    echo "<li>";
                    echo "Visitante nº ".htmlspecialchars($fila['id'])." con ".
                    htmlspecialchars($fila['edad'])." años";
                    echo "</li>";
                } 
            ?>
        </ul>    
    </div>
    <div class="col">
        <h1>Viajes</h1>
        <ul>
            <?php
                while ($fila = $viajeConsulta->fetch_assoc()) {
                    echo "<li>";
                    echo "Viaje ".htmlspecialchars($fila['id'])." con ".
                    htmlspecialchars($fila['nViajeros'])." viajeros a las ".
                    htmlspecialchars($fila['hora'])." en la atracción nº ".
                    htmlspecialchars($fila['idAtraccion'])."";
                    echo "</li>";
                } 
            ?>
        </ul>    
    </div>
</div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Menús de control: </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="listar_atracciones.php">Consultar Atracciones</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="modificar_atraccion.php">Modificar Atracción</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="insertar_atraccion.php">Insertar Atracción</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="eliminar_atraccion.php">Eliminar Atracción</a>
      </li>
    </ul>
  </div>
</nav>
</body>
</html>