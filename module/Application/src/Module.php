<?php

namespace Application;

use Zend\Authentication\Storage\Session;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\Session\SessionManager;

class Module implements ConfigProviderInterface
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(MvcEvent $event)
    {
        $application = $event->getApplication();
        $serviceManager = $application->getServiceManager();

        // The following line instantiates the SessionManager and automatically
        // makes the SessionManager the 'default' one.
        $sessionManager = $serviceManager->get(SessionManager::class);
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\RegisterTable::class => function($container) {
                    $tableGateway = $container->get(Model\RegisterTableGateway::class);
                    return new Model\RegisterTable($tableGateway);
                },
                Model\RegisterTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Register());
                    return new TableGateway('businesses', $dbAdapter, null, $resultSetPrototype);
                },

            ],
        ];

    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\RegisterController::class => function($container) {
                    return new Controller\RegisterController(
                        $container->get(Model\RegisterTable::class),
                        $container->get('SessionData')
                    );
                },
                Controller\SituationController::class => function($container) {
                    return new Controller\SituationController($container->get(Model\RegisterTable::class));
                },
                Controller\IndexController::class => function($container) {
                    return new Controller\IndexController();
                }
            ],
        ];
    }
}
