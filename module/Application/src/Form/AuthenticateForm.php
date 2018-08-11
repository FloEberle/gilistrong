<?php


namespace Application\Form;


use Zend\Form\Form;

class AuthenticateForm extends Form
{
    public function __construct()
    {
        parent::__construct('Authenticate');

        $this->add([
            'name' => 'email',
            'type' => 'email',
            'options' => [
                'label' => 'E-Mail',
            ],
        ]);

        $this->add([
            'name' => 'password',
            'type' => 'password',
            'options' => [
                'label' => 'Password',
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Login',
                'id'    => 'submitbutton',
            ],
        ]);
    }

}