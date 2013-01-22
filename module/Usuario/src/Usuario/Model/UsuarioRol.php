<?php
/**
 * Description of UsuarioRol
 *
 * @author jorts
 */
namespace Usuario\Model;

class UsuarioRol {
    private $id;
    private $id_user;
    private $rol;
    private $fecha;
    
    public function __construct() {
        
    }    
    public function getIdUser()
    {
        return $this->id_user;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }
    public function getRol()
    {
        return  $this->rol;
    }
    
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    
    public function getFecha()
    {
        return $this->fecha;
    }
}