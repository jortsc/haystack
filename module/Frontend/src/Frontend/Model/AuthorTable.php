<?php
/**
 * Description of AuthorTable
 *
 * @author jorts
 */
namespace Frontend\Model;

use Zend\Db\TableGateway\TableGateway;

class AuthorTable
{
    protected $authortTableGateway;
    
    public function __construct(TableGateway $tableGateway)
    {
        $this->authorTableGateway = $tableGateway;
    }   
    public function fetchAll() 
    {
        return $this->authorTableGateway->select();
    }
}