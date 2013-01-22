<?php
namespace Usuario\Form;

use Zend\Form\Form;

/*
 * Clase para el formulario de login
 * Los formularios pueden ser validados con un InputFilter para filtrar los datos con los que se
 * ennvia el formulario.
 * Se puede implementar de forma independiente o dentro de una clase que implemente InputFilterAwareInterface,
 * Como la entidad del model, en este caso lo implemento en la clase Usuario la entidad del modelo.
 * La interfaz define dos metodos de los cuales solo tenemos queimplementar el getter
 * setInputFilter y getInputFilter
 */

class UsuarioForm extends Form
{
    public function __construct($name = null)
    {
        // Le pasamos el nombre al padre y configuramos el form
        parent::__construct('login');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type'  => 'text',
                'id'    => 'email'
            ),
            'options' => array(
                'label' => 'Email',
            ),
        ));
        $this->add(array(
            'name' => 'pass',
            'attributes' => array(
                'type'  => 'password',
                'id'    => 'pass'
            ),
            'options' => array(
                'label' => 'Contraseña',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Enviar',
                'id' => 'submitbutton',
            ),
        ));
    }
}