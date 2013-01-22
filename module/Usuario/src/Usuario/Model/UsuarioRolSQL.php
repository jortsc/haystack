<?php
/**
 * Description of UsuarioRolSQL
 *
 * @author jorts
 */

namespace Usuario\Model;

use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet; 
//Para el ResultSet con hidratacion de objetos
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Stdlib\Hydrator\Reflection as ReflectionHydrator;


class UsuarioRolSQL {
    
    protected $sql;
   
    public function __construct(Sql $sql) {
        $this->sql = $sql;
    }
         
    public function fetchAll()
    {
        $select = $this->sql->select('usuario_rol');
        //Para ejecutar a trabes de select y adapter
//        $selectString = $sql->getSqlStringForSqlObject($select);
//        $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        $resultSet = new ResultSet();
        //este tipo de resultset el que sigue es el mas flexible y nos permite seleccionar la estrategia de hidratacion
        //de objeto, mientras el resultset itera por la filas de la consulta.
        //HydratingResultSet tomará el prototipo de un objeto destino y clonara una vez para cada fila de la consulta  
        //El objeto destino es una clase que implementa la entidad, luego podremos acceder a sus atributos y metodos
        // $resultSet = new HydratingResultSet(new ReflectionHydrator, new UsuarioRol);
        return $resultSet->initialize($results);  

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