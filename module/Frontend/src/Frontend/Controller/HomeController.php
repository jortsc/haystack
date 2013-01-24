<?php 

namespace Frontend\Controller;

use Zend\Mvc\Controller\AbstractActionController;


class HomeController extends AbstractActionController
{
    public function homeAction() 
    {
        $sm = $this->getServiceLocator();
        $daoPublication = $sm->get('Frontend\Model\DaoPublication');
        return new \Zend\View\Model\ViewModel(array(
            'publications' => $daoPublication->fetchAll(),
        ));
    }
    
    public function contactAction()
    {

    }
    
}