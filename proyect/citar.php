<?php

require_once 'database/Conexion.php';

$PDO=Conexion::make();
if ($_SERVER['REQUEST_METHOD']==='POST') {
        $sql = "INSERT INTO citas (fecha, correo_alumno, nombre_empresa) VALUES ('0', :correo_alumno, :nombre_empresa)";
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];

        $parameters = [":correo_alumno"=>$correo, ":nombre_empresa"=>$nombre];

        $statement = $PDO->prepare($sql);
        $statement->execute($parameters);

        header("Location:buscador.php");
}
?>