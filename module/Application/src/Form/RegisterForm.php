<?php

namespace Application\Form;


use Zend\Form\Form;

class RegisterForm extends Form
{
    public function __construct()
    {
        parent::__construct('Register');
        $this->add([
            'name' => 'business',
            'type' => 'text',
            'options' => [
                'label' => 'Name of Business*',
            ],
        ]);
        $this->add([
            'name' => 'location',
            'type' => 'select',
            'options' => [
                'label' => 'Location*',
                'value_options' => [
                    '' => 'Not specified',
                    'Gili Air' => 'Gili Air',
                    'Gili Meno' => 'Gili Meno',
                    'Gili Trawangan' => 'Gili Trawangan',
                    'Lombok' => 'Lombok',
                    'Bali' => 'Bali',
                ],
                
            ],
        ]);

        $this->add([
            'name' => 'type',
            'type' => 'select',
            'options' => [
                'label' => 'Type of business*',
                'value_options' => [
                    '' => 'Not specified',
                    'Restaurant' => 'Restaurant',
                    'Accommodation' => 'Accommodation',
                    'Activities' => 'Activities',
                    'Other' => 'Other',
                ],
            ],
        ]);

        $this->add([
            'name' => 'contactperson',
            'type' => 'text',
            'options' => [
                'label' => 'Contact Person*',
            ],
        ]);

        $this->add([
            'name' => 'phonenumber',
            'type' => 'text',
            'options' => [
                'label' => 'Phone Number*',
            ],
        ]);

        $this->add([
            'name' => 'email',
            'type' => 'email',
            'options' => [
                'label' => 'E-Mail*',
            ],
        ]);



        $this->add([
            'name' => 'password',
            'type' => 'password',
            'options' => [
                'label' => 'Password (for further modifications)*',
            ],
        ]);



        $this->add([
            'name' => 'startdate',
            'type' => 'date',
            'options' => [
                'label' => 'Back operating starting on*',
            ],
        ]);

        $this->add([
            'name' => 'condition',
            'type' => 'select',
            'options' => [
                'label' => 'Current Condition*',
                'value_options' => [
                    '' => 'Not specified',
                    '100% Fully operational' => '100% Fully operational',
                    'Partly operational' => 'Partly operational',
                    'Not operational' => 'Not operational',
                ],
            ],
        ]);

        $this->add([
            'name' => 'website',
            'type' => 'text',
            'options' => [
                'label' => 'Website',
            ],
        ]);

        $this->add([
            'name' => 'gps',
            'type' => 'text',
            'options' => [
                'label' => 'GPS Coordinates (Format: Lat,Long)',
            ],
        ]);

        $this->add([
            'name' => 'notice',
            'type' => 'textarea',
            'options' => [
                'label' => 'Additional Information',
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Register',
                'id'    => 'submitbutton',
            ],
        ]);

    }

}