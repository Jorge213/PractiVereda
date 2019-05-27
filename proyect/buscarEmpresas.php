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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="prinAlumno.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="buscarEmpresas.php">Empresas<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <hr>
    <br><br>

    <div class="row justify-content-center">
        <div class="col-3">
            <a href="buscador.php" class="btn btn-success" style="width: 200px"><b>Buscar empresas</b></a>
        </div>
    </div>

    <br><br><br>

    <div class="row justify-content-center">
        <div class="col-3">
            <a href="todasCitasAlumno.php" class="btn btn-success" style="width: 200px"><b>Citas</b></a>
        </div>
    </div>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>