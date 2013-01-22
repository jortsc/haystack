<?php 

namespace Frontend\Controller;

use Zend\Mvc\Controller\AbstractActionController;


class HomeController extends AbstractActionController
{
    public function homeAction() 
    {
        $sm = $this->getServiceLocator();
        $daoPublication = $sm->get('Frontend\Model\DaoPublication');
        $author = $sm->get('Author\Model\AuthorTable');
        return new \Zend\View\Model\ViewModel(array(
            'publications' => $daoPublication->fetchAll(),
            'author' => $author->fetchAll()
        ));
    }
    
    public function contactAction()
    {
        $sm = $this->getServiceLocator();
        $author = $sm->get('Author\Model\AuthorTable');
        return new \Zend\View\Model\ViewModel(array(
            'author' => $author->fetchAll()
        ));
    }
    
}