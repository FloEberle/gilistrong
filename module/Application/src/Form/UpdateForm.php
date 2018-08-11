<?php

namespace Application\Form;


use Zend\Form\Form;

class UpdateForm extends Form
{
    public function __construct()
    {
        parent::__construct('Update');
        $this->add([
            'name' => 'business',
            'type' => 'text',
            'options' => [
                'label' => 'Name of Business*',
            ],
            'attributes' => [
                'readonly' => 'true',
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
                'value' => 'Update',
                'id'    => 'submitbutton',
            ],
        ]);

    }

}