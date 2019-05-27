<?php

require_once 'database/Conexion.php';

$PDO=Conexion::make();
if ($_SERVER['REQUEST_METHOD']==='POST') {
        $sql = "UPDATE citas SET fecha=:fecha WHERE nombre_empresa=:nombre AND correo_alumno=:correo";
        $fecha = $_POST['fecha'];
        $nombre = $_POST['nempresa'];
        $correo = $_POST['calumno'];

        $parameters = [":nombre"=>$nombre, ":correo"=>$correo, ":fecha"=>$fecha];

        $statement = $PDO->prepare($sql);
        $statement->execute($parameters);

        header("Location:citaEmpresa.php");

}
?>