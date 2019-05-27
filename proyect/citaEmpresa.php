<?php
session_start();
require_once  'entities/Empresa.php';
require_once 'database/Conexion.php';

$PDO=Conexion::make();

$sql = "Select * from citas where nombre_empresa=:nombre AND fecha='0'";
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

        btn {color: black}

        .contenido{background-color: lightgreen;border: 2px solid black;width: 1000px;margin-left: 5%}

        div#difu{width: 100%;height: 100%;position: fixed;top:0;background-color: rgba(255,255,255,0.7);}

        form.cont{position: absolute;top:40%;left:34%;padding:0 3%;transform:translate(-50%.0);background-color: rgba(255,255,255,0.9);width:550px;height: 210px;border: 5px solid black;color:black;border-radius: 20px;}

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
                <li class="nav-item active">
                    <a class="nav-link" href="citaEmpresa.php">Peticiones<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="todasCitasEmpresa.php">Citas pendientes<span class="sr-only">(current)</span></a>
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
    foreach ($citas as $cita){
        echo '<form class="contenido mt-5" method="post">';
        echo '<div class="col mt-2">Un alumno quiere realizar las practicas en su empresa y solicitado una cita para conocerles</div>';
        echo '<div class="col mt-1">Correo del alumno: '.$cita["correo_alumno"].'</div>';
        echo '<div class="col" id="'.$cita["correo_alumno"].'"><button type="button" class="btn btn-success mt-4 mb-3 si"><b>Citar</b></button></div></form>';
    }
    ?>

    <script type="text/javascript">

        var boton = document.getElementsByClassName('btn');

        for (var i=0;i<boton.length;i++){
            boton[i].onclick=cita;
        }

        function cita(event) {

            var boton = event.target.parentNode;
            var padre = boton.parentNode;
            var correo = padre.id;

            let difu = document.createElement('div');
            difu.id="difu";
            document.body.appendChild(difu);

            let cont = document.createElement('form');
            cont.setAttribute("method", "post");
            cont.setAttribute("action", "ponerFecha.php");
            cont.className="cont";
            document.body.appendChild(cont);

            let jumpo = document.createElement('br');
            cont.appendChild(jumpo);

            let texto = document.createElement('span');
            cont.appendChild(texto);
            let txt = document.createTextNode("Que dia quieres quedar con el alumno con el correo "+correo+" ?");
            texto.appendChild(txt);

            let jump = document.createElement('br');
            cont.appendChild(jump);
            let ump = document.createElement('br');
            cont.appendChild(ump);

            let fecha = document.createElement('input');
            fecha.setAttribute("type", "text");
            fecha.setAttribute("name", "fecha");
            fecha.setAttribute("placeholder", "ejem: 01/02/2019 15:00");
            cont.appendChild(fecha);

            let nempresa = document.createElement('input');
            nempresa.setAttribute("type", "hidden");
            nempresa.setAttribute("name", "nempresa");
            nempresa.setAttribute("value", "<?php echo $_SESSION["nombre"] ?>");
            cont.appendChild(nempresa);

            let calumno = document.createElement('input');
            calumno.setAttribute("type", "hidden");
            calumno.setAttribute("name", "calumno");
            calumno.setAttribute("value", correo);
            cont.appendChild(calumno);

            let jump1 = document.createElement('br');
            cont.appendChild(jump1);
            let jump2 = document.createElement('br');
            cont.appendChild(jump2);

            let enviar1 = document.createElement('button');
            enviar1.className="btn verd";
            enviar1.id="botondifu";
            enviar1.setAttribute("type", "submit");
            let txtb1 = document.createElement('b');
            let textob1 = document.createTextNode("Aceptar");
            txtb1.appendChild(textob1);
            enviar1.appendChild(txtb1);
            cont.appendChild(enviar1);

            enviar1.onclick=enviar;

        }

    </script>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>