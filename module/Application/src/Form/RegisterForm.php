<?php

namespace Application\Form;


use Zend\Captcha\Dumb;
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
                'label' => 'Password*',
            ],
            'attributes' => [
                'placeholder' => 'Min. 6 Characters. For further modification of your record'
            ]
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
                    'Fully operational' => 'Fully operational',
                    'Partly operational' => 'Partly operational',
                    'Not operational' => 'Not operational',
                ],
            ],
        ]);

        $this->add([
            'name' => 'website',
            'type' => 'url',
            'options' => [
                'label' => 'Website',
            ],
        ]);

        $this->add([
            'name' => 'gps',
            'type' => 'text',
            'options' => [
                'label' => 'GPS Coordinates',

            ],
            'attributes' => [
                'placeholder' => 'Latitude, Longitude (Example: -8.363690, 116.082383)',
            ]
        ]);

        $this->add([
            'name' => 'notice',
            'type' => 'textarea',
            'options' => [
                'label' => 'Additional Information: Include your current status and immediate needs here (e.g. “rebuild in progress”, or “main building needs structural testing”, etc)',
            ],
        ]);

        $this->add([
            'name' => 'captcha',
            'type' => 'captcha',
            'options' => [
                'label' => 'Anti Spam ',
                'captcha' => new Dumb(),
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
