<?php
session_start();
require_once 'database/Conexion.php';
require_once 'entities/Alumno.php';

$PDO=Conexion::make();
if ($_SERVER['REQUEST_METHOD']==='POST') {

        $sql = "UPDATE alumnos SET nombre=:nombre WHERE correo=:correo";
        $nombre = $_POST['nombre'];
        $correo = $_SESSION['correo'];

        $parameters = [":nombre"=>$nombre,":correo"=>$correo];

        $statement = $PDO->prepare($sql);
        $statement->execute($parameters);

    $sql = "UPDATE alumnos SET apellidos=:apellidos WHERE correo=:correo";
    $apellidos = $_POST['apellidos'];
    $correo = $_SESSION['correo'];

    $parameters = [":apellidos"=>$apellidos,":correo"=>$correo];

    $statement = $PDO->prepare($sql);
    $statement->execute($parameters);

    $sql = "UPDATE alumnos SET curso=:curso WHERE correo=:correo";
    $curso = $_POST['curso'];
    $correo = $_SESSION['correo'];

    $parameters = [":curso"=>$curso,":correo"=>$correo];

    $statement = $PDO->prepare($sql);
    $statement->execute($parameters);

        header("Location:prinAlumno.php");

}
?>