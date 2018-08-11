<?php

namespace Application\Controller;


use Application\Form\RegisterForm;
use Application\Model\Register;
use Application\Model\RegisterTable;
use Zend\Mvc\Controller\AbstractActionController;

class RegisterController extends AbstractActionController
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
        $form = new RegisterForm();

        /** @var \Zend\Http\PhpEnvironment\Request $request */
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return ['form' => $form];
        }

        $register = new Register();
        $form->setInputFilter($register->getInputFilter());
        $form->setData($request->getPost());

        if (!$form->isValid()) {
            return ['form' => $form];
        }

        $register->exchangeArray($form->getData());
        $this->registerTable->saveRegistration($register);
        $this->flashMessenger()->addSuccessMessage('Thank you! Your Business is succesfully registered.');
        return $this->redirect()->toRoute('home');
    }

}