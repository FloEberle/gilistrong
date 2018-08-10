<?php

namespace Application;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
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
                    return new Controller\RegisterController($container->get(Model\RegisterTable::class));
                },
                Controller\IndexController::class => function($container) {
                    return new Controller\IndexController();
                }
            ],
        ];
    }
}
