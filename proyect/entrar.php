<?php
session_start();
require_once 'entities/Alumno.php';
require_once  'entities/Empresa.php';
require_once  'entities/Administrador.php';
require_once 'database/Conexion.php';

$PDO=Conexion::make();
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (!empty($_POST['correo'])) {
        $sql = "Select * from alumnos where correo=:correo";
        $correo = $_POST['correo'];
        $contrasenya = $_POST['contrasenya'];

        $statement = $PDO->prepare($sql);
        $statement->bindParam(':correo', $correo);
        $statement->execute();
        $alumno = $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Alumno");

        if (!empty($alumno)) {
            if (!password_verify($contrasenya, $alumno[0]->getContrasenya())){
                echo "La contraseña no coincide";
                header("Location:errores.php");
            }else{
                $_SESSION['nombre']=$alumno[0]->getNombre();
                $_SESSION['correo']=$alumno[0]->getCorreo();
                header("Location:prinAlumno.php");
            }
        } else {
            echo "El correo no existe";
            header("Location:errores.php");
        }

    }elseif(!empty($_POST['usuario'])){
        $sql = "Select * from empresas where usuario=:usuario";
        $usuario = $_POST['usuario'];
        $contrasenya = $_POST['contrasenya'];

        $statement = $PDO->prepare($sql);
        $statement->bindParam(':usuario', $usuario);
        $statement->execute();
        $empresa = $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Empresa");

        if (!empty($empresa)) {
            if (!password_verify($contrasenya, $empresa[0]->getContrasenya())){
                header("Location:errores.php");
            }else{
                if ($empresa[0]->getEstado()==0){
                    header("Location:estado0.php");
                }elseif ($empresa[0]->getEstado()==1){
                    header("Location:estado1.php");
                }else {
                    $_SESSION['nombre'] = $empresa[0]->getNombre();
                    header("Location:prinEmpresas.php");
                }
            }
        } else {
            header("Location:errores.php");
        }
    }else{
        $sql = "Select * from administradores where usuario=:usuario";
        $usuario = $_POST['uadmin'];
        $contrasenya = $_POST['contrasenya'];

        $statement = $PDO->prepare($sql);
        $statement->bindParam(':usuario', $usuario);
        $statement->execute();
        $admin = $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Administrador");

        if (!empty($admin)) {
            if ($admin[0]->getUsuario() == "admin") {
                if ($admin[0]->getContrasenya() == "1234") {
                    $_SESSION['nombre'] = $admin[0]->getUsuario();
                    header("Location:prinAdmin.php");
                } else {
                    echo "La contraseña no coincide";
                    header("Location:errores.php");
                }
            } else {
                if (!password_verify($contrasenya, $admin[0]->getContrasenya())) {
                    echo "La contraseña no coincide";
                }else{
                    $_SESSION["nombre"] = $admin[0]->getUsuario();
                    header("Location:prinAdmin.php");
                }
            }
        }else{
            header("Location:errores.php");
        }
    }
}

?>