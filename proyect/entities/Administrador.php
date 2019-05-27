<?php

class Administrador
{
    protected $usuario;
    protected $contraseña;

    public function __construct($usuario=null, $contraseña=null)
    {
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    public function getContrasenya()
    {
        return $this->contraseña;
    }

    public function setContrasenya($contraseña)
    {
        $this->contraseña = $contraseña;
        return $this;
    }

}