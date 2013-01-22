<?php 

namespace Usuario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use \Usuario\Form\UsuarioForm;
use \Usuario\Model\FiltersLogin;

class UsuarioController extends AbstractActionController
{
    private $_auth;
    
//    public function __construct($auth) {
//       var_dump($auth);
//    }
    
    public function dispatch(\Zend\Stdlib\RequestInterface $request, \Zend\Stdlib\ResponseInterface $response = null) {
        parent::dispatch($request, $response);
    }
    
    public function loginAction()
    {
        $form = new UsuarioForm();
        $form->get('submit')->setValue('Enviar');
        if($this->getRequest()->isPost())
        {
            $form = new UsuarioForm();
            $loginFilter = new FiltersLogin();
            $form->setInputFilter($loginFilter->getInputFilter());
            $form->setData($this->getRequest()->getPost());
            
            if ($form->isValid()) {
                
//                $sm = $this->getServiceLocator();
//                $auth = $sm->get('Usuario\Model\Auth');
                
                $result = $this->getAuth()->login($form->getInputFilter()->getValue('email'),$form->getInputFilter()->getValue('pass'));               
                if($result->getResult()->isValid())
                {
                    $this->flashMessenger()->addMessage($result->getMsg());
                    return $this->redirect()->toRoute('usuario', array(
                    'action' => 'userSpace',
                       'id' => 18//testing
                   ));
                }
                else
                {
                    $return['msg'] = $result->getMsg();
                }
                
            }
        }
        $return['form'] = $form;
        return $return;
    }
   
    public function userSpaceAction()
    {
        //El ServiceManager puede crear un objeto UsuarioTable por nosotros como
        // le hemos indicado en Module.php
        $sm = $this->getServiceLocator();
        $tableUsers = $sm->get('Usuario\Model\UsuarioTable');
        $usersRoles = $sm->get('Usuario\Model\UsuarioRolSQL');
        

        if ($this->getAuth()->hasIdentity()) {
            // Identity exists; get it
            $identity = $this->getAuth()->getIdentity();
        }
        
        $msg = $this->flashMessenger()->getMessages();
        return new \Zend\View\Model\ViewModel(array(
            'users' => $tableUsers->fetchAll(),
            'roles' => $usersRoles->fetchAll(),
            'auth' => $this->params('id'),
            'x' => $msg[0].' '.$identity->email,
            'id' => $identity->id
            
        ));
    }
    
    public function getAuth()
    {
        if(!$this->_auth)
        {
            $sm = $this->getServiceLocator();
            $this->_auth = $sm->get('Usuario\Model\Auth');          
        }
        return $this->_auth;
    }
}