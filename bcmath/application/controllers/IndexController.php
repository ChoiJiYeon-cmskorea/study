<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $list = new Application_Model_DbTable_Excel();
        $this->view->excelList = $list->fetchAll();
        $form = new Application_Form_List();
        $this->view->form = $form;
        /* require_once 'Was/Member/Form/Member.php';

        $memberForm = new Was_Member_Form_Member();
        $memberForm->setName('memberForm');
        $memberForm->setMethod(Zend_Form::METHOD_POST);
        $this->view->memberForm = $memberForm; */
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $num1 = $form->getValue('num1');
                $num2 = $form->getValue('num2');
                $this->view->num1 = $num1;
                $this->view->num2 = $num2;
            }
        }
    }

    public function listAction()
    {
        $form = new Application_Form_List();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $writer = $form->getValue('writer');
                $title = $form->getValue('title');
                $content = $form->getValue('content');
                $excel = new Application_Model_DbTable_Excel();
                $excel->addList($writer, $title, $content);

                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
        /* require_once 'Was/Member/Form/Member.php';

        $memberForm = new Was_Member_Form_Member();
        $memberForm->setName('memberForm');
        $memberForm->setMethod(Zend_Form::METHOD_POST);
        $this->view->memberForm = $memberForm; */

    }
    public function addAction()
    {
        $form = new Application_Form_List();
        $form->submit->setLabel('Add');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $num1 = $form->getValue('num1');
                $num2 = $form->getValue('num2');

                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }

    }

    public function editAction()
    {
        $form = new Application_Form_List();
        $form->submit->setLabel('Save');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $pk = (int)$form->getValue('pk');
                $writer = $form->getValue('writer');
                $title = $form->getValue('title');
                $content = $form->getValue('content');
                $excel = new Application_Model_DbTable_Excel();
                $excel->updateList($pk, $writer, $title, $content);

                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $pk = $this->_getParam('pk', 0);
            if ($pk > 0) {
                $excel = new Application_Model_DbTable_Excel();
                $form->populate($excel->getList($pk));
            }
        }

    }

    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $pk = $this->getRequest()->getPost('pk');
                $excel = new Application_Model_DbTable_Excel();
                $excel->deleteList($pk);
            }
            $this->_helper->redirector('index');
        } else {
            $pk = $this->_getParam('pk', 0);
            $excel = new Application_Model_DbTable_Excel();
            $this->view->excel = $excel->getList($pk);
        }
    }
}







