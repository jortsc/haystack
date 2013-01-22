<?php
/**
 * Description of UsuarioTable
 *
 * @author jorts
 */

namespace Usuario\Model;

use Zend\Db\TableGateway\TableGateway;

class UsuarioTable {
    
    protected $usuariotTableGateway;
    
    public function __construct(TableGateway $tableGateway)
    {
        $this->usuariotTableGateway = $tableGateway;
    }   
    public function fetchAll() {
        //returns a resultset with all users
        return $this->usuariotTableGateway->select();
    }
}