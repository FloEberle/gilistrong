<?php

namespace Application\Controller;


use Application\Form\AuthenticateForm;
use Application\Form\RegisterForm;
use Application\Form\UpdateForm;
use Application\Model\Register;
use Application\Model\RegisterTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;

class RegisterController extends AbstractActionController
{
    /**
     * @var RegisterTable
     */
    private $registerTable;
    /**
     * @var Container
     */
    private $sessionContainer;

    public function __construct(
        RegisterTable $registerTable,
        Container $sessionContainer
    )
    {
        $this->registerTable = $registerTable;
        $this->sessionContainer = $sessionContainer;
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

    public function updateAction()
    {
        if (!$this->sessionContainer->loggedInEmail) {
            $this->redirect()->toRoute('register', ['controller' => 'register', 'action' => 'authenticate']);
            return;
        }

        $form = new UpdateForm();
        /** @var \Zend\Http\PhpEnvironment\Request $request */
        /** @var Register $registration */
        $registration = $this->registerTable->getRegistration($this->sessionContainer->loggedInEmail);
        $form->bind($registration);

        $request = $this->getRequest();
        if (!$request->isPost()) {
            return ['form' => $form];
        }


        $registration->getInputFilter()
            ->remove('business')
            ->remove('location')
            ->remove('type')
            ->remove('contactperson')
            ->remove('phonenumber')
            ->remove('email')
            ->remove('password');

        $form->setInputFilter($registration->getInputFilter());
        $form->setData($request->getPost());
        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $this->registerTable->update($this->sessionContainer->loggedInEmail, $registration);


        $this->flashMessenger()->addSuccessMessage('Thank you! Your Business is succesfully updated.');
        return $this->redirect()->toRoute('home');

    }

    public function authenticateAction()
    {
        $form = new AuthenticateForm();

        /** @var \Zend\Http\PhpEnvironment\Request $request */
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return ['form' => $form];
        }

        $data = $request->getPost();
        $form->setData($data);

        if (!$form->isValid()) {
            return ['form' => $form];
        }

        /** @var \Zend\Db\ResultSet\ResultSet $result */
        $result = $this->registerTable->authenticate($data->get('email'), $data->get('password'));
        if ($result->count() === 0) {
            /** @var \Zend\Form\Element\Email $email */
            $email = $form->get('email');
            $email->setMessages(['Invalid login data']);
            return ['form' => $form];
        }

        $this->sessionContainer->loggedInEmail = $data->get('email');

        $this->flashMessenger()->addSuccessMessage('Authentication successful');
        return $this->redirect()->toRoute('register', ['controller' => 'register', 'action' => 'update']);

    }

    public function logoutAction()
    {
        unset($this->sessionContainer->loggedInEmail);
        $this->flashMessenger()->addSuccessMessage('Logout successful');
        return $this->redirect()->toRoute('home');

    }

}