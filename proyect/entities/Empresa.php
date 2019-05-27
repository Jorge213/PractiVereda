<?php

class Empresa
{
    protected $usuario;
    protected $contraseña;
    protected $nombre;
    protected $correo;
    protected $telefono;
    protected $direccion;
    protected $provincia;
    protected $poblacion;
    protected $categoria;
    protected $puestos;
    protected $estado;
    protected $descripcion;

    public function __construct($usuario=null, $contraseña=null, $nombre=null, $correo=null, $telefono=null, $direccion=null, $provincia=null, $poblacion=null, $categoria=null, $puestos=null, $estado=null, $descripcion=null)
    {
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->provincia = $provincia;
        $this->poblacion = $poblacion;
        $this->categoria = $categoria;
        $this->puestos = $puestos;
        $this->estado = $estado;
        $this->descripcion = $descripcion;

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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
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

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
        return $this;
    }

    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
        return $this;
    }

    public function getPoblacion()
    {
        return $this->poblacion;
    }

    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;
        return $this;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
        return $this;
    }

    public function getPuestos()
    {
        return $this->puestos;
    }

    public function setPuestos($puestos)
    {
        $this->puestos = $puestos;
        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }


}