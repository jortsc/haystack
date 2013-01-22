<?php
/**
 * Description of UsuarioRolSQL
 *
 * @author jorts
 */
namespace Frontend\Model;

use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet; 
use Frontend\Model\Publication;

class DaoPublication 
{
    
    private $_sql;
    private $_publication;
   
    public function __construct(Sql $sql) 
    {
        $this->_sql = $sql;
    }
         
    public function fetchAll()
    {
        $select = $this->_sql->select('publications');
        $select->order('fecha DESC');
//        $select->limit(5);
        $statement   = $this->_sql->prepareStatementForSqlObject($select);
        $results     = $statement->execute();
        $resultSet   = new ResultSet();
        $rows        = $resultSet->initialize($results);  
        
        $thePublications = array();
        foreach ($rows as $index => $publi) {
            $publication = new Publication();
            $publication->setId($publi->id);
            $publication->setIdCategory($publi->id_categoria);
            $publication->setTitle($publi->title);
            $publication->setExcerpt($publi->excerpt);
            $publication->setContent($publi->content);
            $publication->setFecha($publi->fecha);
            $publication->setVotos($publi->votos);
            
            $thePublications[$index] = $publication;
            $publication = null;
        }

        return $thePublications;
    }
    
    
    
    public function getUserRol($userId)
    {
        $select = $this->sql->select('usuario_rol')->where(array('id_user' => $userId));
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        $resultSet = new ResultSet();
        return $resultSet->initialize($results);  
    }   
}