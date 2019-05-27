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

$sql = "Select nombre from Cursos";
$statement = $PDO->prepare($sql);
$statement->execute();
$cursos = $statement->fetchAll(PDO::FETCH_ASSOC);

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

    <div class="row">
        <?php
        foreach ($alumnos as $alumno) {
            echo '<form class="contenido mt-5" action="cambioDatos.php" method="post">';
            echo '<div class="col mt-2 visible">FICHA PERSONAL</div>';
            echo '<label for="curso"class="ml-3">Nombre</label>';
            echo '<input class="col" value="'.$alumno->getNombre().'" name="nombre">';
            echo '<label for="curso" class="ml-3">Apellidos</label>';
            echo '<input class="col" value="'.$alumno->getApellidos().'" name="apellidos">';
            echo '<label for="curso" class="ml-3">Curso</label>';
            echo '<select class="custom-select" id="inputGroupSelect01" name="curso">';
            foreach ($cursos as $curso) {
                            echo '<option value="'.$curso["nombre"].'">'.$curso["nombre"].'</option>';
            }
            echo '</select>';
            echo '<div class="col mb-3 mt-3 ml-3"><button type="submit" class="btn btn-success"><b>Cambiar</b></button><a href="prinAlumno.php" class="btn btn-success ml-3"><b>Volver</b></a></div></form>';
        }
        ?>
    </div>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>