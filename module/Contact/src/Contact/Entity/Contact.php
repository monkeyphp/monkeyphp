<?php
/**
 * Contact.php
 *
 * @category   Contact
 * @package    Contact
 * @subpackage Contact\Entity
 * @author     David White <david@monkeyphp.com>
 */
namespace Contact\Entity;

use RuntimeException;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\EmailAddress;

/**
 * Contact
 *
 * @category   Contact
 * @package    Contact
 * @subpackage Contact\Entity
 * @author     David White <david@monkeyphp.com>
 */
class Contact implements InputFilterAwareInterface
{
    /**
     * Instance of InputFilter
     *
     * @var InputFilter
     */
    protected $inputFilter;

    protected $email;

    protected $message;

    protected $createdDate;

    protected $readDate;

    protected $id;


    public function getEmail()
    {
        return $this->email;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    public function getReadDate()
    {
        return $this->readDate;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    public function setReadDate($readDate)
    {
        $this->readDate = $readDate;
        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    public function getInputFilter()
    {
        if (! isset($this->inputFilter)) {
            $inputFilter = new InputFilter();

            // email
            $email = new Input('email');
            $email->setAllowEmpty(false);
            $email->getValidatorChain()->attach(
                new EmailAddress()
            );

            // message
            $message = new Input('message');
            $message->setAllowEmpty(false);

            // createdDate
            $createdDate = new Input('createdDate');

            // modified
            $modifiedDate = new Input('modifiedDate');

            // readDate
            $readDate = new Input('readDate');

            // id
            $id = new Input('id');

            $inputFilter->add($email)
                ->add($message)
                ->add($createdDate)
                ->add($modifiedDate)
                ->add($readDate);

            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new RuntimeException('Not implemented');
    }

}
