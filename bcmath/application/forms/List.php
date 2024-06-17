<?php

class Application_Form_List extends Zend_Form
{
    public function init()
    {
        $this->setName('album');

        $pk = new Zend_Form_Element_Hidden('pk');
        $pk->addFilter('Int');

        $num1 = new Zend_Form_Element_Text('num1');
        $num1->setLabel('num1')
               ->setRequired(true)
               ->addValidator('NotEmpty');

       $num2 = new Zend_Form_Element_Text('num2');
       $num2->setLabel('num2')
       ->setRequired(true)
       ->addValidator('NotEmpty');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array($pk, $num1, $num2, $submit));
    }
}