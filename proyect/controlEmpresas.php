<?php
session_start();
require_once  'entities/Empresa.php';
require_once 'database/Conexion.php';

$PDO=Conexion::make();

$sql = "Select * from Empresas where estado=0";

$statement = $PDO->prepare($sql);
$statement->execute();
$empresas = $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Empresa");

?>
<!DOCTYPE html>
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
    <a class="navbar-brand" href="prinAdmin.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="controlEmpresas.php">Empresas<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
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

    <br>
    <hr>

    <?php
        foreach ($empresas as $empresa){
            echo '<form class="contenido mt-5" method="post" action="petiEmpresas.php">';
            echo '<div class="col mt-2">Nombre: '.$empresa->getNombre().'</div>';
            echo '<div class="col">Correo: '.$empresa->getCorreo().'</div>';
            echo '<div class="col">Teléfono: '.$empresa->getTelefono().'</div>';
            echo '<div class="col">Población: '.$empresa->getPoblacion().'</div>';
            echo '<div class="col">Direción: '.$empresa->getDireccion().'</div>';
            echo '<div class="col">Categoria: '.$empresa->getCategoria().'</div>';
            echo '<div class="col">Puestos: '.$empresa->getPuestos().'</div>';
            echo '<div class="col">Descripcion: '.$empresa->getDescripcion().'</div>';
            echo '<input type="hidden" name="nombre" value="'.$empresa->getNombre().'">';
            echo '<input type="hidden" class="oculto" name="peticion">';
            echo '<div class="col"><button type="submit" class="btn btn-success mt-4 mb-3 si"><b>Aceptar</b></button><button type="submit" class="btn btn-success mt-4 mb-3 no" style="margin-left: 3%"><b>Rechazar</b></button></div></form>';
        }
    ?>

    <script type="text/javascript">

        var bsi = document.getElementsByClassName('si');
        var bno = document.getElementsByClassName('no');

        for (var i=0;i<bsi.length;i++){
            bsi[i].onmouseover=aceptado;
        }

        for (var i=0;i<bsi.length;i++){
            bno[i].onmouseover=rechazado;
        }

        function aceptado(event) {

            var pare = event.target.parentNode;
            var padre = pare.parentNode;
            var oculto = padre.getElementsByTagName('input')[1];

            oculto.value=1;
        }

        function rechazado(event) {

            var pare = event.target.parentNode;
            var padre = pare.parentNode;
            var oculto = padre.getElementsByTagName('input')[1];

            oculto.value=0;
        }

    </script>
</div>
</body>
</html>