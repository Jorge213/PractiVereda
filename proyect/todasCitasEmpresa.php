<?php
session_start();
require_once  'entities/Empresa.php';
require_once 'database/Conexion.php';

$PDO=Conexion::make();

$sql = "Select * from citas where nombre_empresa=:nombre AND fecha!='0'";
$nombre = $_SESSION['nombre'];

$statement = $PDO->prepare($sql);
$statement->bindParam(':nombre', $nombre);
$statement->execute();
$citas = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <title>Document</title>
    <style>

        .verd {background-color: lightgreen}

        .contenido{background-color: lightgreen;border: 2px solid black;width: 1000px;margin-left: 5%}

    </style>
</head>
<body>

<div class="container mt-3">
    <div class="jumbotron jumbotron-fluid verd">
        <div class="container">
            <a href="#" style="text-decoration: none;color: black"><h1 class="display-4">PractiVereda</h1></a>
            <p class="lead"><?php echo "- ".$_SESSION["nombre"] ?></p>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="prinEmpresas.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="citaEmpresa.php">Peticiones<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="todasCitasEmpresa.php">Citas pendientes<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <hr>

    <?php
    foreach ($citas as $cita){
        $day = substr($cita["fecha"],0,2);
        $mes = substr($cita["fecha"],3,2);
        $any = substr($cita["fecha"],6,4);
        $espacio = strpos($cita["fecha"]," ");
        $hour = substr($cita["fecha"],$espacio,3);
        $fechacita = mktime($hour,0,0,$mes,$day,$any);
        $time = time();
        if ($fechacita>$time) {
            echo '<form class="contenido mt-5" method="post">';
            echo '<div class="col mt-2">Dia: ' . $cita["fecha"] . '</div>';
            echo '<div class="col mt-1">Correo del alumno: ' . $cita["correo_alumno"] . '</div>';
        }
    }
    ?>

</div>
</body>
</html>
