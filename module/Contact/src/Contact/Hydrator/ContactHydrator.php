<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Contact\Hydrator;

use Contact\Entity\Contact;
use Zend\Stdlib\Hydrator\AbstractHydrator;
use Zend\Stdlib\Hydrator\ClassMethods;
/**
 * Description of ContactHydrator
 *
 * @author David White <david@monkeyphp.com>
 */
class ContactHydrator extends AbstractHydrator
{

    protected $hydrator;

    protected function getHydrator()
    {
        if (! isset($this->hydrator)) {
            $hydrator = new ClassMethods();
            $this->hydrator = $hydrator;
        }
        return $this->hydrator;
    }

    public function extract($object)
    {
        if ($object instanceof Contact) {
            return null;
        }
        return $this->getHydrator()->extract($object);
    }

    public function hydrate(array $data, $object)
    {
        if ($object instanceof Contact) {
            return $object;
        }

        return $this->getHydrator()->hydrator($data, $object);
    }
}
