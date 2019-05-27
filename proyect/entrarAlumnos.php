<?php session_start();

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

        .visible{font-size: 3.5em}

        .espacio{margin-left: 33%}

    </style>
</head>
<body>

<div class="container mt-3">
    <div class="jumbotron jumbotron-fluid verd">
        <div class="container">
            <a href="index.php" style="text-decoration: none;color: black"><h1 class="display-4">PractiVereda</h1></a>
            <p class="lead"> - Alumnos</p>
        </div>
    </div>
    <hr>
    <br>

    <div class="row">
        <div class="col visible" style="text-align: center">REGISTRO</div>
    </div>

    <div class="row espacio mt-4">
        <div class="col-12 col-md-6">
            <form method="post" action="registrar.php">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control">
                </div>
                <div class="form-group">
                    <label for="curso">Curso</label>
                    <select class="custom-select" id="inputGroupSelect01" name="curso">
                        <?php
                        foreach ($cursos as $curso) {
                            echo '<option value="'.$curso["nombre"].'">'.$curso["nombre"].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp" name="correo" placeholder="ejemplo@ieslavereda.es">
                </div>
                <div class="form-group">
                    <label for="email">Contraseña</label>
                    <input type="password" class="form-control" name="contrasenya">
                </div>
                <div class="form-group form-check mt-4">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Aceptar terminos y condiciones</label>
                </div>
                <br>
                <button type="submit" class="btn verd" style="margin-left: 31%"><b>Enviar</b></button>
                <a href="#login" class="btn verd" style="margin-left: 1%"><b>Login</b></a>
            </form>
        </div>
    </div>
    <br><br><br><br>
    <hr>
    <br>
    <div class="row mt-5">
        <div class="col visible" style="text-align: center">LOGIN</div>
    </div>

    <div class="row espacio mt-4">
        <div class="col-12 col-md-6">
            <form method="post" action="entrar.php">
                <div class="form-group" id="login">
                    <label for="nombre">Correo</label>
                    <input type="text" class="form-control" name="correo">
                </div>
                <div class="form-group">
                    <label for="apellidos">Contraseña</label>
                    <input type="password" class="form-control" name="contrasenya">
                </div>
                <button type="submit" class="btn verd mt-4" style="margin-left: 40%"><b>Entrar</b></button>
            </form>
        </div>
    </div>
    <br><br><br>
    <br><br><br>
</div>
    <script type="text/javascript">

        var fregis = document.getElementsByTagName('form')[0];
        var fentrar = document.getElementsByTagName('form')[1];
        var campos = fregis.getElementsByClassName('form-control');
        var campos2 = fentrar.getElementsByClassName('form-control');
        var cajita = fregis.getElementsByTagName('input')[4];
        var benviar = fregis.getElementsByTagName('button')[0];
        var benviar2 = fentrar.getElementsByTagName('button')[0];
        var cont;

        for (var i = 0;i<campos.length;i++){
            campos[i].onblur=comprobar;
        }

        for (var i = 0;i<campos2.length;i++){
            campos2[i].onblur=comprobar2;
        }

        benviar.onmouseover=verde;
        benviar2.onmouseover=bentrarcom;
        cajita.onclick=verde;
        campos[2].onblur=correo;

        function comprobar(event) {
            cont=0;
            if (event.target.value==""){
                event.target.style.border="2px solid red";
            }else {
                event.target.style.border="2px solid #86D156";
            }

            for (var i = 0;i<campos.length;i++){
                if (campos[i].style.borderColor=="rgb(134, 209, 86)"){
                    cont++;
                }else{
                    cont=0;
                    break;
                }
            }

            if (cont>0){
                benviar.disabled=false;
            }


        }

        function comprobar2(event) {
            cont=0;
            if (event.target.value==""){
                event.target.style.border="2px solid red";
            }else {
                event.target.style.border="2px solid #86D156";
            }

            for (var i = 0;i<campos2.length;i++){
                if (campos2[i].style.borderColor=="rgb(134, 209, 86)"){
                    cont++;
                }else{
                    cont=0;
                    break;
                }
            }

            if (cont>0){
                benviar2.disabled=false;
            }


        }

        function num(event) {

            var reg = new RegExp("\\d");
            var res = reg.test(event.target.value);
            var aux = 0;

            if (event.target.value==""){
                event.target.style.border="2px solid red";
                aux = 1;
            }else {
                event.target.style.border="2px solid #86D156";
            }

            if (aux!=1){
             if (res==true){
                event.target.style.border="2px solid red";
             }else {
                    event.target.style.border="2px solid #86D156";
                }
            }

            for (var i = 0;i<campos.length;i++){
                if (campos[i].style.borderColor=="rgb(134, 209, 86)"){
                    cont++;
                }else{
                    cont=0;
                    break;
                }
            }

            if (cont>0){
                benviar.disabled=false;
            }

        }
        
        function verde() {

            let aux = 0;

            for (var i = 0;i<campos.length;i++){
                if (campos[i].style.borderColor!="rgb(134, 209, 86)"){
                    benviar.disabled=true;
                    aux = 1;
                }
            }

            if (aux==0){
             if (cajita.checked==false){
                  benviar.disabled=true;
             }else{
                 benviar.disabled=false;
                }
            }
            
        }

        function bentrarcom() {

            let aux = 0;

            for (var i = 0;i<campos.length;i++){
                if (campos2[i].style.borderColor!="rgb(134, 209, 86)"){
                    benviar2.disabled=true;
                    aux = 1;
                }
            }

        }

        function correo(event) {

            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

            if (emailRegex.test(event.target.value)) {
                event.target.style.border="2px solid #86D156";
            } else {
                event.target.style.border="2px solid red";
            }

        }

    </script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
