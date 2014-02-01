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
     * Return an instance of ContactForm
     *
     * @return ContactForm
     */
    public function getContactForm()
    {
        if (! isset($this->contactForm)) {
            $this->contactForm = $this->getServiceLocator()->get('contact_form_contact');
        }
        return $this->contactForm;
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

        $viewModel = new ViewModel();
        $viewModel->setTemplate('contact/contact/contact');

        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
}
