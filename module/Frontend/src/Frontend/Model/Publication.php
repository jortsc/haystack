<?php
/**
 * Description of Post
 * @author jorts
 */
namespace Frontend\Model;

class Publication
{
    private $_id;
    private $_idCategoria;
    private $_title;
    private $_excerpt;
    private $_content;
    private $_fecha;
    private $_votos;
    private $_category;

    public function __construct(/*$idCa,$title,$excerpt,$content,$category*/) 
    {
//        $this->setIdCategory($idCa);
//        $this->setTitle($title);
//        $this->setExcerpt($excerpt);
//        $this->setContent($content); 
//        $this->setCategory($category);
    }
   
    public function __destruct() {}

    public function setId($id) 
    {
        $this->_id = $id;
    }
    
    public function getId()
    {
        return $this->_id;
    }

    public function setIdCategory($idCategory) 
    {
        $this->_idCategoria = $idCategory;
    }
    
    public function getIdCategoria()
    {
        return $this->_idCategoria;
    }
    
    public function setTitle($title)
    {
        $this->_title = $title;
    }
    public function getTitle()
    {
        return  $this->_title;
    }
    
    public function setExcerpt($excerpt)
    {
        $this->_excerpt = $excerpt;
    }
    public function getExcerpt()
    {
        return  $this->_excerpt;
    }
    
    public function setContent($content)
    {
        $this->_content = $content;
    }
    public function getContent()
    {
        return  $this->_content;
    }
    
    public function setFecha($fecha)
    {
        $this->_fecha = $fecha;
    }
    
    public function getFecha()
    {
        return $this->_fecha;
    }
    
    public function setVotos($votos)
    {
        $this->_votos = $votos;
    }
    public function getVotos()
    {
        return  $this->_votos;
    }
    
    public function setCategory($category)
    {
        $this->_category = $category;
    }
    public function getCategory()
    {
        return  $this->_category;
    }
}