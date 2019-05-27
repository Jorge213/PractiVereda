<?php

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

        .visible{font-size: 1.1em}

        .bd{border: 1px solid black}

    </style>
</head>
<body>

<div class="container mt-3">
    <div class="jumbotron jumbotron-fluid verd">
        <div class="container">
            <h1 class="display-4">PractiVereda</h1>
        </div>
    </div>
<hr>
<br>

<div class="row mt-3">
    <div class="col-lg-6 col-12">
        <img src="img/logo.png" class="img-fluid" >
    </div>
    <div class="col-lg-6 col-12">
        <p class="visible">Esta pagina web a sido creada con el proposito de poder encontrar un lugar apropiado para hacer las practicas del grado medio o superior que estes cursando en I.E.S La Vereda.</p>
    </div>
</div>

<br><br><br><br>

<div class="row mt-5 ml-4">
    <div class="col-12 col-lg-4">
        <div class="card bd" style="width: 18rem; height: 230px">
            <div class="card-body">
                <h5 class="card-title">Alumnos</h5>
                <p class="card-text">Si eres alumno del IES La vereda clica en el boton para resgistrarte o iniciar sesión y empezar a buscar empresas a tu gusto</p>
                <a href="entrarAlumnos.php" class="btn verd"><b>Entrar</b></a>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card bd" style="width: 18rem; height: 230px">
            <div class="card-body">
                <h5 class="card-title">Empresas</h5>
                <p class="card-text">Apartado para registrar una empresa en nuestra base de datos y controlar las demandas de alumnos</p>
                <a href="entrarEmpresas.php" class="btn verd"><b>Entrar</b></a>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card bd" style="width: 18rem; height: 230px">
            <div class="card-body">
                <h5 class="card-title">Administrador</h5>
                <p class="card-text">Clica en el boton y usa los credenciales necesarios para acceder a la aplicación de administrador</p>
                <a href="entrarAdmin.php" class="btn verd"><b>Entrar</b></a>
            </div>
        </div>
    </div>
</div>


</div>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
