<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Contact\Table;

use Contact\Entity\Contact;
use Exception;
use Zend\Db\TableGateway\TableGateway;

/**
 * Description of ContactTable
 *
 * @author David White <david@monkeyphp.com>
 */
class ContactTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->setTableGateway($tableGateway);
    }

    public function getTableGateway()
    {
        return $this->tableGateway;
    }

    public function setTableGateway($tableGateway)
    {
        $this->tableGateway = $tableGateway;
        return $this;
    }

    public function getContact($id)
    {
        $id = (int)$id;
        $contact = $this->getTableGateway()->select(array('id' => $id))->current();
        if (! $contact) {
            throw new Exception('Could not locate the Contact');
        }
        return $contact;
    }

    public function saveContact(Contact $contact)
    {
        $data = array(
            'email' => $contact->getEmail(),
            'message' => $contact->getMessage(),
            'created_date' => ($contact->getCreatedDate()) ? $contact->getCreatedDate()->format('Y-m-d H:i:s') : date('Y-m-d H:i:s'),
            'modified_date' => ($contact->getReadDate()) ? $contact->getReadDate()->format('Y-m-d H:i:s') : date('Y-m-d H:i:s'),
        );

        if (null === ($id = ($contact->getId()))) {
            $this->getTableGateway()->insert($data);
        } else {
            if ($this->getContact($id)) {
                $this->getTableGateway()->update($data, array('id' => $id));
            } else {
                throw new Exception('Contact does not exist');
            }
        }
    }


}
