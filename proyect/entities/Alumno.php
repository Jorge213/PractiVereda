<?php

class Alumno
{
    protected $nombre;
    protected $apellidos;
    protected $correo;
    protected $contraseña;
    protected $curso;
    protected $empresafav;

    public function __construct($nombre=null, $apellidos=null, $correo=null, $contraseña=null, $curso=null, $empresafav=null)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->contraseña = $contraseña;
        $this->curso = $curso;
        $this->empresafav = $empresafav;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
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

    public function getCurso()
    {
        return $this->curso;
    }

    public function setCurso($curso)
    {
        $this->curso = $curso;
        return $this;
    }

    public function getEmpresafav()
    {
        return $this->empresafav;
    }

    public function setEmpresafav($empresafav)
    {
        $this->empresafav = $empresafav;
        return $this;
    }


}