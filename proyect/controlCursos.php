<?php
session_start();

include "database/Conexion.php";

$PDO=Conexion::make();

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

        btn {color: black}

        .visible{font-size: 3.5em}

        .espacio{margin-left: 33%}

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
        <a class="navbar-brand" href="prinAdmin.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="controlEmpresas.php">Empresas<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="controlCursos.php">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="añadirAdmin.php">Añadir admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row mt-5">
        <div class="col visible" style="text-align: center">AÑADIR CURSO</div>
    </div>

    <div class="row espacio mt-4">
        <div class="col-12 col-md-6">
            <form method="post" action="añadirCurso.php">
                <div class="form-group" id="login">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <button type="submit" class="btn verd mt-4" style="margin-left: 40%"><b>Añadir</b></button>
            </form>
        </div>
    </div>

    <br><br><br><br><hr><br>

    <div class="row mt-5">
        <div class="col visible" style="text-align: center">ELIMINAR CURSO</div>
    </div>

    <div class="row espacio mt-4">
        <div class="col-12 col-md-6">
            <form method="post" action="añadirCurso.php">
                <div class="form-group" id="login">
                    <label for="nombre">Curso a eliminar</label>
                    <select class="custom-select" id="inputGroupSelect01" name="curso">
                        <?php
                        foreach ($cursos as $curso) {
                            echo '<option value="'.$curso["nombre"].'">'.$curso["nombre"].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn verd mt-4" style="margin-left: 40%"><b>Eliminar</b></button>
            </form>
        </div>
    </div>

    <br><br><br><br>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>