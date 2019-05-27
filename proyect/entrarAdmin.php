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

        .visible{font-size: 3.5em}

        .espacio{margin-left: 33%}

    </style>
</head>
<body>

<div class="container mt-3">
    <div class="jumbotron jumbotron-fluid verd">
        <div class="container">
            <a href="index.php" style="text-decoration: none;color: black"><h1 class="display-4">PractiVereda</h1></a>
            <p class="lead"> - Administrador</p>
        </div>
    </div>
    <hr>
    <br>

    <div class="row mt-5">
        <div class="col visible" style="text-align: center">LOGIN</div>
    </div>

    <div class="row espacio mt-4">
        <div class="col-12 col-md-6">
            <form method="post" action="entrar.php">
                <div class="form-group" id="login">
                    <label for="nombre">Usuario</label>
                    <input type="text" class="form-control" name="uadmin">
                </div>
                <div class="form-group">
                    <label for="apellidos">Contraseña</label>
                    <input type="password" class="form-control" name="contrasenya">
                </div>
                <button type="submit" class="btn verd mt-4" style="margin-left: 40%"><b>Entrar</b></button>
            </form>
        </div>
    </div>

    <br><br><br><br><br><br>
</div>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
