<?php
/**
 * ContactController.php
 *
 * @category   Contact
 * @package    Contact
 * @subpackage Contact\Controller
 * @author     David White <david@monkeyphp.com>
 */
namespace Contact\Controller;

use Contact\Entity\Contact;
use Contact\Form\ContactForm;
use Contact\Hydrator\ContactHydrator;
use Contact\Table\ContactTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * ContactController
 *
 * @category   Contact
 * @package    Contact
 * @subpackage Contact\Controller
 * @author     David White <david@monkeyphp.com>
 */
class ContactController extends AbstractActionController
{
    /**
     * Instance of ContactForm
     *
     * @var ContactForm
     */
    protected $contactForm;

    /**
     * Instance of ContactHydrator
     *
     * @var ContactHydrator
     */
    protected $contactHydrator;

    /**
     * Instance of ContactTable
     *
     * @var ContactTable
     */
    protected $contactTable;

    /**
     * Return an instance of ContactForm
     *
     * @return ContactForm
     */
    public function getContactForm()
    {
        if (! isset($this->contactForm)) {
            $this->contactForm = $this->getServiceLocator()->get('contact_contact_form');
        }
        return $this->contactForm;
    }

    /**
     * Return an instance of Hydrator
     *
     * @return ContactHydrator
     */
    public function getContactHydrator()
    {
        if (! isset($this->contactHydrator)) {
            $this->contactHydrator = $this->getServiceLocator()->get('contact_contact_hydrator');
        }
        return $this->contactHydrator;
    }

    /**
     * Return an instance of ContactTable
     *
     * @return ContactTable
     */
    public function getContactTable()
    {
        if (! isset($this->contactTable)) {
            $this->contactTable = $this->getServiceLocator()->get('contact_contact_table');
        }
        return $this->contactTable;
    }

    /**
     * Index action [/contact]
     *
     * @link https://groups.google.com/forum/#!searchin/recaptcha/invalid$20referer/recaptcha/4TYSDO5OS9s/-q3VT_xbtPgJ
     *
     * @return ViewModel
     */
    public function contactAction()
    {
        $form = $this->getContactForm();

        $request = $this->getRequest();

        if ($request->isPost()) {
            $contact = new Contact();
            $form->setInputFilter($contact->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $hydrator = $this->getContactHydrator();
                $hydrator->hydrate($form->getData(), $contact);
                $this->getContactTable()->saveContact($contact);
                return $this->redirect()->toRoute('contact_route_thankyou');
            } 
        }

        $viewModel = new ViewModel();
        $viewModel->setTemplate('contact/contact/contact');
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }

    /**
     * Thankyou action [/thankyou]
     *
     * @return ViewModel
     */
    public function thankyouAction()
    {

    }
}
