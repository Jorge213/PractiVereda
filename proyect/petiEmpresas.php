<?php

require_once 'database/Conexion.php';

$PDO=Conexion::make();
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if ($_POST['peticion']==1) {
        $sql = "UPDATE empresas SET estado = 2 WHERE nombre=:nombre";
        $nombre = $_POST['nombre'];

        $parameters = ["nombre"=>$nombre];

        $statement = $PDO->prepare($sql);
        $statement->execute($parameters);

        header("Location:controlEmpresas.php");
    }elseif($_POST['peticion']==0){
        $sql = "UPDATE empresas SET estado = 1 WHERE nombre=:nombre";
        $nombre = $_POST['nombre'];

        $parameters = ["nombre"=>$nombre];

        $statement = $PDO->prepare($sql);
        $statement->execute($parameters);

        header("Location:controlEmpresas.php");
    }

}
?>