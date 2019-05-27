<?php
session_start();
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
    <hr>
    <br><br>

    <div class="row justify-content-center">
        <div class="col-3">
            <a href="controlEmpresas.php" class="btn btn-success" style="width: 200px"><b>Empresas</b></a>
        </div>
    </div>

    <br><br><br>

    <div class="row justify-content-center">
        <div class="col-3">
            <a href="controlCursos.php" class="btn btn-success" style="width: 200px"><b>Cursos</b></a>
        </div>
    </div>

    <br><br><br>

    <div class="row justify-content-center">
        <div class="col-3">
            <a href="añadirAdmin.php" class="btn btn-success" style="width: 200px"><b>Añadir admin</b></a>
        </div>
    </div>

    <br><br><br>

    <div class="row justify-content-center">
        <div class="col-3">
            <a href="logout.php" class="btn btn-success" style="width: 200px"><b>Cerrar sesión</b></a>
        </div>
    </div>
    <br><br><br>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>