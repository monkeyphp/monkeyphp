<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Description of HomeController
 *
 * @author David White <david@monkeyphp.com>
 */
class HomeController extends AbstractActionController
{
    // http://stackoverflow.com/questions/18014885/zend-2-x-disable-layout-and-view-renderer
    // http://blog.evan.pro/disabling-the-layout-in-zend-framework-2

    /**
     * Home action [/]
     *
     *
     * @return ViewModel
     */
    public function homeAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    /**
     * Header action [/header]
     *
     * @return ViewModel
     */
    public function headerAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('home/home/header');
        $viewModel->setTerminal(true);

        return $viewModel;
    }

    /**
     * Footer action [/footer]
     * 
     * @return ViewModel
     */
    public function footerAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('home/home/footer');
        $viewModel->setTerminal(true);
        return $viewModel;
    }
}
