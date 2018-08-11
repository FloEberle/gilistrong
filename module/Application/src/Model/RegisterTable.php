<?php


namespace Application\Model;


use Zend\Db\TableGateway\TableGatewayInterface;

class RegisterTable
{
    private const STATIC_SALT = 'gilistrong';

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function saveRegistration(Register $register)
    {
        $data = [
            'business' => $register->getBusiness(),
            'location' => $register->getLocation(),
            'type' => $register->getType(),
            'contactperson' => $register->getContactperson(),
            'phonenumber' => $register->getPhonenumber(),
            'email' => $register->getEmail(),
            'password' => sha1($register->getPassword() . RegisterTable::STATIC_SALT),
            'startdate' => $register->getStartdate(),
            'condition' => $register->getCondition(),
            'website' => $register->getWebsite(),
            'gps' => $register->getGps(),
            'notice' => $register->getNotice(),
        ];


        $this->tableGateway->insert($data);
    }

}