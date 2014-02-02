<?php
/**
 * Module.php
 *
 * @category   Contact
 * @package    Contact
 * @author     David White <david@monkeyphp.com>
 */
namespace Contact;

use Contact\Entity\Contact;
use Contact\Form\ContactForm;
use Contact\Hydrator\ContactHydrator;
use Contact\Table\ContactTable;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

/**
 * Module
 *
 * @category   Contact
 * @package    Contact
 * @author     David White <david@monkeyphp.com>
 */
class Module implements ServiceProviderInterface, AutoloaderProviderInterface, ConfigProviderInterface
{
    // http://framework.zend.com/manual/2.0/en/modules/zend.service-manager.quick-start.html#zend-service-manager-quick-start-config
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                // return an instance of ContactForm
                'contact_contact_form' => function ($serviceManager) {
                    $contactForm = new ContactForm();
                    return $contactForm;
                },
                // return an instance of ContactHydrator
                'contact_contact_hydrator' => function ($serviceManager) {
                    $contactHydrator = new ContactHydrator();
                    return $contactHydrator;
                },
                // return an instance of ContactTable
                'contact_contact_table' => function ($serviceManager) {
                    $tableGateway = $serviceManager->get('contact_contact_table_gateway');
                    $table = new ContactTable($tableGateway);
                    return $table;
                },
                // return an instance of TableGateway
                'contact_contact_table_gateway' => function ($serviceManager) {
                    $dbAdapter = $serviceManager->get('Zend\Db\Adapter\Adapter');
                    $hydrator = $serviceManager->get('contact_contact_hydrator');
                    $objectPrototype = new Contact();
                    $resultSet = new HydratingResultSet($hydrator, $objectPrototype);
                    $tableGateway = new TableGateway('contact', $dbAdapter, null, $resultSet);
                    return $tableGateway;
                },
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
