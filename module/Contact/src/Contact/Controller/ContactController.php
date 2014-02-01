<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Contact\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Description of ContactController
 *
 * @author David White <david@monkeyphp.com>
 */
class ContactController extends AbstractActionController
{
    /**
     * Index action [/contact]
     *
     * @return ViewModel
     */
    public function contactAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('contact/contact/contact');
        return $viewModel;
    }
}
