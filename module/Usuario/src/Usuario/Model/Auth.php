<?php
/**
 * Description of Login
 *
 * @author jorts
 */
namespace Usuario\Model;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Db\Adapter\Adapter;
use Zend\Authentication\Result;

class Auth {
    
    const FAILURE_IDENTITY_NOT_FOUND = 'La identidad introducida no existe';
    const FAILURE_CREDENTIAL_INVALID = 'La contraseña no es válida';
    const FAILURE_IDENTITY_AMBIGUOUS = 'La identidad proporcionada es ambigua';
    const SUCCESS = 'Bienvenido ';
    
    private $_auth;
    private $_authAdapter;
    private $_msg;
    private $_result;
    
    
    public function __construct(Adapter $dbAdapter) 
    {
        if(!$this->_auth)
        {
            $this->_auth = new AuthenticationService();
            $this->_authAdapter =  new AuthAdapter($dbAdapter);
            $this->_authAdapter
                 ->setTableName('usuario')
                 ->setIdentityColumn('email')
                 ->setCredentialColumn('pass')
             ;
        }
    }
    
    public function login($email,$pass)
    {
        $this->_authAdapter
                ->setIdentity($email)
                ->setCredential($pass)
        ;
        $this->_result = $this->_auth->authenticate($this->_authAdapter);
        
        switch ($this->_result->getCode()) 
        {
            case Result::SUCCESS:
                     // store the identity as an object where only the username and
                    // real_name have been returned
                    $storage = $this->_auth->getStorage();
                    $storage->write($this->_authAdapter->getResultRowObject(array(
                        'id',
                        'email',
                    )));
                    $this->_msg = self::SUCCESS;
                break;
            
            case Result::FAILURE_IDENTITY_NOT_FOUND:
                    $this->_msg = self::FAILURE_IDENTITY_NOT_FOUND;
                break;
            
            case Result::FAILURE_CREDENTIAL_INVALID:
                    $this->_msg = self::FAILURE_CREDENTIAL_INVALID;
                break;
            
            case Result::FAILURE_IDENTITY_AMBIGUOUS:
                    $this->_msg = self::FAILURE_IDENTITY_AMBIGUOUS;
                break;
            
            case Result::FAILURE:
                    throw new Exception($this->_result->getMessages());
            break;
        
            case Result::FAILURE_UNCATEGORIZED:
                    throw new Exception($this->_result->getMessages());
                break;
            
        }         
        return $this;
    }
    
    public function hasIdentity()
    {
        return $this->_auth->hasIdentity();
    }
    
    public function getIdentity() 
    {
        $retValue = null;
        if($this->_auth->hasIdentity())
        {
            $retValue = $this->_auth->getIdentity();
        }
        return $retValue;
    }
    
    
    public function getResult()
    {
        return $this->_result;
    }
   
    public function getMsg()
    {
        return $this->_msg;
    }
    
    public function setMsg($msg)
    {
        $this->_msg = $msg;
    }
    

    
    //AQUI CONECTAR CON LOS DATOS DE LOGIN A PELO CON EL ADAPTER getdriver
//    use Zend\Db\Adapter\Driver\ResultInterface;
//    use Zend\Db\ResultSet\ResultSet;
//
//    $stmt = $driver->createStatement('SELECT * FROM users');
//    $stmt->prepare($parameters);
//    $result = $stmt->execute();
//
//    if ($result instanceof ResultInterface && $result->isQueryResult()) {
//        $resultSet = new ResultSet;
//        $resultSet->initialize($result);
//
//        foreach ($resultSet as $row) {
//            echo $row->my_column . PHP_EOL;
//        }
//    }   
}