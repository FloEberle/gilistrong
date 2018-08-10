<?php


namespace Application\Controller;


use Application\Model\RegisterTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SituationController extends AbstractActionController
{
    /**
     * @var RegisterTable
     */
    private $registerTable;

    public function __construct(RegisterTable $registerTable)
    {
        $this->registerTable = $registerTable;
    }

    public function indexAction()
    {
        return new ViewModel([
            'businesses' => $this->registerTable->fetchAll()
        ]);
    }
}