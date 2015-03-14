<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 3/14/2015
 * Time: 11:55 AM
 */

namespace DaleyPiwik\Delegator;


use Zend\ServiceManager\DelegatorFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class InjectPiwikPhpTracker implements DelegatorFactoryInterface
{

    /**
     * A factory that creates delegates of a given service
     *
     * @param ServiceLocatorInterface $serviceLocator the service locator which requested the service
     * @param string $name the normalized service name
     * @param string $requestedName the requested service name
     * @param callable $callback the callback that is responsible for creating the service
     *
     * @return mixed
     */
    public function createDelegatorWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName, $callback)
    {
        /** @var $controller \DaleyPiwik\Contract\ServerSideAnalyticsUserInterface */
        $controller = $callback();

        $controller->addServerSideAnalytics($serviceLocator->get('DaleyPiwik\Service\PhpTracker'));

        return $controller;

    }
}