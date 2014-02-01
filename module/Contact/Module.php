<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Contact;

use Contact\Form\ContactForm;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
/**
 * Description of Module
 *
 * @author David White <david@monkeyphp.com>
 */
class Module implements ServiceProviderInterface, AutoloaderProviderInterface, ConfigProviderInterface
{
    // http://framework.zend.com/manual/2.0/en/modules/zend.service-manager.quick-start.html#zend-service-manager-quick-start-config
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'contact_form_contact' => function($serviceManager) {
                    $contactForm = new ContactForm();
                    $config = $serviceManager->get('config');
                    return $contactForm;
                }
            ),
            'shared' => array()
        );
    }

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
