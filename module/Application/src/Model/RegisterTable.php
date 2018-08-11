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

    public function authenticate($email, $password)
    {
        return $this->tableGateway->select(['email' => $email, 'password' => sha1($password . RegisterTable::STATIC_SALT)]);
    }

    public function getRegistration($email)
    {
        $rowset = $this->tableGateway->select(['email' => $email]);
        return $rowset->current();
    }

    public function update(string $email, Register $register)
    {
        $data = [
            'startdate' => $register->getStartdate(),
            'condition' => $register->getCondition(),
            'website' => $register->getWebsite(),
            'gps' => $register->getGps(),
            'notice' => $register->getNotice(),
        ];

        $this->tableGateway->update($data, ['email' => $email]);
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