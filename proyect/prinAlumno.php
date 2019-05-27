<?php
session_start();
require_once  'entities/Alumno.php';
require_once 'database/Conexion.php';

$PDO=Conexion::make();

$sql = "Select * from alumnos where correo=:correo";
$correo = $_SESSION['correo'];

$statement = $PDO->prepare($sql);
$statement->bindParam(':correo', $correo);
$statement->execute();
$alumnos = $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Alumno");

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

        .contenido{background-color: lightgreen;border: 2px solid black;width: 1000px;margin-left: 5%;border-radius: 25px}

        .visible{font-size: 2.5em}

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
        <a class="navbar-brand" href="prinAlumno.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="buscarEmpresas.php">Empresas<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <hr>

    <div class="row">
        <?php
        foreach ($alumnos as $alumno) {
            echo '<div class="contenido mt-5">';
            echo '<div class="col mt-2 visible">FICHA PERSONAL</div>';
            echo '<div class="col">Nombre: ' . $alumno->getNombre() . ' ' . $alumno->getApellidos() . '</div>';
            echo '<div class="col">Correo: ' . $alumno->getCorreo() . '</div>';
            echo '<div class="col mb-3">Curso: ' . $alumno->getCurso() . '</div>';
            echo '<div class="col mb-3"><a href="cambiarDatos.php" class="btn btn-success"><b>Cambiar datos</b></a></div></div>';
        }
        ?>
    </div>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>