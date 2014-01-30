<?php
/**
 * Module.php
 */
namespace Home;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
/**
 * Description of Module
 *
 * @author David White <david@monkeyphp.com>
 */
class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
             'Zend\Loader\ClassMapAutoloader' => array(
                 __DIR__ . '/autoload_classmap.php',
             ),
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 ),
             ),
         );
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
