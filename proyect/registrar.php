<?php

require_once 'database/Conexion.php';

$PDO=Conexion::make();
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (!empty($_POST['curso'])) {
        $sql = "INSERT INTO Alumnos (nombre, apellidos, correo, contraseña, curso) VALUES (:nombre, :apellidos, :correo, :contrasenya, :curso)";
        $contrasenya = $_POST['contrasenya'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $curso = $_POST['curso'];

        $contrasenya=password_hash($contrasenya, PASSWORD_DEFAULT);
        $parameters = [":contrasenya"=>$contrasenya,"nombre"=>$nombre,":apellidos"=>$apellidos,":correo"=>$correo,":curso"=>$curso];

        $statement = $PDO->prepare($sql);
        $statement->execute($parameters);

        header("Location:entrarAlumnos.php");
    }elseif(!empty($_POST['usuario'])){
        $sql = "INSERT INTO Empresas (usuario, contraseña, nombre, correo, telefono, direccion, provincia, poblacion, categoria, puestos, estado, descripcion) VALUES (:usuario, :contrasenya, :nombre, :correo, :telefono, :direccion, :provincia, :poblacion, :categoria, :puestos, 0, :descripcion)";
        $contrasenya = $_POST['contrasenya'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $provincia = $_POST['provincia'];
        $poblacion = $_POST['poblacion'];
        $categoria = $_POST['categoria'];
        $puestos = $_POST['puestos'];
        $descripcion = $_POST['descripcion'];

        $contrasenya=password_hash($contrasenya, PASSWORD_DEFAULT);
        $parameters = [":contrasenya"=>$contrasenya,"nombre"=>$nombre,":usuario"=>$usuario,":correo"=>$correo,":telefono"=>$telefono,":direccion"=>$direccion,":provincia"=>$provincia,":poblacion"=>$poblacion,":categoria"=>$categoria,":puestos"=>$puestos,":descripcion"=>$descripcion];

        $statement = $PDO->prepare($sql);
        $statement->execute($parameters);

        header("Location:entrarEmpresas.php");
    }else{
        $sql = "INSERT INTO Administradores (usuario, contraseña) VALUES (:usuario, :contrasenya)";
        $contrasenya = $_POST['contrasenya'];
        $usuario = $_POST['uadmin'];

        $contrasenya=password_hash($contrasenya, PASSWORD_DEFAULT);
        $parameters = [":contrasenya"=>$contrasenya,":usuario"=>$usuario];

        $statement = $PDO->prepare($sql);
        $statement->execute($parameters);

        header("Location:añadirAdmin.php");
    }
}

?>