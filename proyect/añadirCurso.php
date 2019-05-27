<?php
require_once 'database/Conexion.php';

$PDO=Conexion::make();
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (!empty($_POST['nombre'])) {
        $sql = "INSERT INTO Cursos (nombre) VALUES (:nombre)";
        $nombre = $_POST['nombre'];

        $parameters = [":nombre" => $nombre];

        $statement = $PDO->prepare($sql);
        $statement->execute($parameters);

        header("Location:controlCursos.php");
    }else{
        $sql = "DELETE FROM Cursos WHERE nombre=:nombre;";
        $nombre = $_POST['curso'];

        $parameters = [":nombre" => $nombre];

        $statement = $PDO->prepare($sql);
        $statement->execute($parameters);

        header("Location:controlCursos.php");
    }
}
?>