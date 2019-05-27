<?php


class Conexion
{


    public static function make()
    {
        try{

            $opciones=[PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT=>true];

            $PDO = new PDO(
                'mysql:host=127.0.0.1;dbname=practivereda;charset=utf8','jorge','1234',$opciones
            );
        } catch (PDOException $PDOException){
            die($PDOException->getMessage());
        }
        return $PDO;
    }

}

?>