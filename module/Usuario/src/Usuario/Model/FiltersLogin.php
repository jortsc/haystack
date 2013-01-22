<?php
namespace Usuario\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FiltersLogin
 *
 * @author jorts
 */
class FiltersLogin implements InputFilterAwareInterface
{
    protected $inputFilter;                 
        //Filtro con validadores para el formulario de registro
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used, if you want implement it!");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));
            //Filters StripTags and StringTrim to remove unwanted HTML and unnecessary white space
            //StringLength validator to ensure that the user doesn’t enter more characters
            //than we can store into the database
            $inputFilter->add($factory->createInput(array(
                'name'     => 'email',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 4,
                            'max'      => 50,
                        ),
                    ),
                   array(
                        'name'    => 'Zend\Validator\EmailAddress'
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'pass',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 4,
                            'max'      => 50,
                        ),
                    ),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
   
}

?>