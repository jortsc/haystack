<?php
namespace Usuario\Model;

class Usuario
{
    public $id;
    public $email;
    public $nombre;
    // Esto método es necesario para ServiceManager además de :
    // In order to work with Zend\Db’s TableGateway class, we need to implement 
    // the exchangeArray() method. This method simply copies the data from the 
    // passed in array to our entity’s properties. We will add an input filter 
    // for use with our form later.
    public function exchangeArray($data)
    {
        $this->id      = (isset($data['id']))    ? $data['id']    : null;
        $this->email   = (isset($data['email'])) ? $data['email'] : null;
        $this->nombre  = (isset($data['pass']))  ? $data['pass']  : null;
    }
    /*El metodo del form bind() adjunta el modelo a el formulario
     * Se utiliza de dos formas:
     * Una cuando pintamos el formulario, los valores iniciales de cada campo
     * son extraidos del modelo.
     * Otra, tras una validacion exitosa en $form->isValid(), los datos del formulario son 
     * vueltos a poner en el modelo
     * Estas operaciones se llevan a cabo utilizando un hydrator object, hay diferentes hydrators
     * pero el por defecto es Zend\Stdlib\Hydrator\ArraySerializable el cual espera
     * encontrar en dos metodos en el modelo, getArrayCopy() and exchangeArray()
     * 
     * Como resultado de utilizar el metodo del form bind() no es necesario poblar el formulario de nuievo
     * Para usar con bind()
     */
//    public function getArrayCopy()
//    {
//        return get_object_vars($this);
//    }

}