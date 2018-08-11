<?php


namespace Application\Model;


use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Form\Exception\DomainException;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\EmailAddress;
use Zend\Validator\StringLength;

class Register implements InputFilterAwareInterface
{
    private $inputFilter;

    /** @var string */
    private $business;
    /** @var string */
    private $location;
    /** @var string */
    private $type;
    /** @var string */
    private $contactperson;
    /** @var string */
    private $phonenumber;
    /** @var string */
    private $email;
    /** @var string */
    private $password;
    /** @var string */
    private $startdate;
    /** @var string */
    private $condition;
    /** @var string */
    private $website;
    /** @var string */
    private $gps;
    /** @var string */
    private $notice;



    /**
     * Set input filter
     *
     * @param  InputFilterInterface $inputFilter
     * @return InputFilterAwareInterface
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }

    public function exchangeArray(array $data)
    {
        $this->business = !empty($data['business']) ? $data['business'] : null;
        $this->location = !empty($data['location']) ? $data['location'] : null;
        $this->type = !empty($data['type']) ? $data['type'] : null;
        $this->contactperson = !empty($data['contactperson']) ? $data['contactperson'] : null;
        $this->phonenumber = !empty($data['phonenumber']) ? $data['phonenumber'] : null;
        $this->email = !empty($data['email']) ? $data['email'] : null;
        $this->password = !empty($data['password']) ? $data['password'] : null;
        $this->startdate = !empty($data['startdate']) ? $data['startdate'] : null;
        $this->condition = !empty($data['condition']) ? $data['condition'] : null;
        $this->website = !empty($data['website']) ? $data['website'] : null;
        $this->gps = !empty($data['gps']) ? $data['gps'] : null;
        $this->notice = !empty($data['notice']) ? $data['notice'] : null;
    }

    public function getArrayCopy()
    {
        return [
            'business' => $this->business,
            'startdate' => $this->startdate,
            'condition' => $this->condition,
            'website' => $this->website,
            'gps' => $this->gps,
            'notice' => $this->notice,
        ];
    }


    /**
     * Retrieve input filter
     *
     * @return InputFilterInterface
     */
    public function getInputFilter()
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }
        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'business',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'location',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'type',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'contactperson',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'phonenumber',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                [
                    'name' => EmailAddress::class,
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'password',
            'required' => true,
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 6,
                        'max' => 100,
                    ],
                ],
            ],
        ]);



        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }

    /**
     * @return string
     */
    public function getBusiness()
    {
        return $this->business;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getContactperson()
    {
        return $this->contactperson;
    }

    /**
     * @return string
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * @return string
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @return string
     */
    public function getGps()
    {
        return $this->gps;
    }

    /**
     * @return string
     */
    public function getNotice()
    {
        return $this->notice;
    }

}