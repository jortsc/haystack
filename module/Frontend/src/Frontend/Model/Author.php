<?php
/**
 * Description of Author
 *
 * @author jorts
 */

namespace Frontend\Model;

class Author 
{
    protected $id;
    protected $nombre;
    protected $img;
    protected $description;
    protected $firma;
    protected $fecha;
     
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function getId()
    {
        return $this->id;
    }
    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function setImg($img)
    {
        $this->img = $img;
        return $this;
    }
    public function getImg()
    {
        return $this->img;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setFirma($firma)
    {
        $this->firma = $firma;
        return $this;
    }
    public function getFirma()
    {
        return $this->firma;
    }
    
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
}