<?php
/**
 * ContactForm.php
 *
 * @category   Contact
 * @package    Contact
 * @subpackage Contact\Form
 * @author     David White <david@monkeyphp.com>
 */
namespace Contact\Form;

use Zend\Captcha\ReCaptcha;
use Zend\Form\Element\Captcha;
use Zend\Form\Element\Csrf;
use Zend\Form\Element\DateTime;
use Zend\Form\Element\Email;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;

/**
 * ContactForm
 *
 * @category   Contact
 * @package    Contact
 * @subpackage Contact\Form
 * @author     David White <david@monkeyphp.com>
 */
class ContactForm extends Form
{
    /**
     * Constructor
     *
     * @param string|null $name The name of the Form
     *
     * @return void
     */
    public function __construct($name = null)
    {
        parent::__construct('contact');

        $this->setAttribute('role', 'form');

        // email
        $email = new Email('email', array('label' => 'Email'));
        $email->setAttributes(array('class' => 'form-control', 'placeholder' => 'Email address'));

        // message
        $message = new Textarea('message', array('label' => 'Message'));
        $message->setAttributes(array('class' => 'form-control', 'placeholder' => 'Message'));

        // created_date
        $createdDate = new DateTime('createdDate', array('label' => 'Created'));
        $createdDate->setAttributes(array());

        // read_date
        $readDate = new DateTime('readDate', array('label' => 'Read'));
        $readDate->setAttributes(array());

        // id
        $id = new Hidden('id', array());
        $id->setAttributes(array());

        // captcha
        $captcha = new Captcha('captcha', array('label' => 'Please verify that you are human'));
        $captcha->setCaptcha(new ReCaptcha(array(
            'private_key' => '6LeH7u0SAAAAAM9Hkhe-MTZXfyxRnQQ8ALTL1ymX',
            'public_key'  => '6LeH7u0SAAAAAFNSDr4SpEhXAZUyCJjYGFfKqnzt'
        )));

        // csrf
        $csrf = new Csrf('csrf', array(
            'csrf_options' => array(
                'timeout' => 600
            )
        ));

        // submit
        $submit = new Submit('submit', array());
        $submit->setAttributes(array('value' => 'Submit'));

        $this->add($email);
        $this->add($message);
        $this->add($createdDate);
        $this->add($readDate);
        $this->add($id);
        $this->add($captcha);
        $this->add($csrf);
        $this->add($submit);
    }
}
