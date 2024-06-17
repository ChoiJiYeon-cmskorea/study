<?php

class Application_Form_List extends Zend_Form
{
    public function init()
    {
        $this->setName('album');

        $pk = new Zend_Form_Element_Hidden('pk');
        $pk->addFilter('Int');

        $writer = new Zend_Form_Element_Text('writer');
        $writer->setLabel('writer')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');

        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('Title')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty');

        $content = new Zend_Form_Element_Text('content');
        $content->setLabel('content')
              ->setRequired(true)
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array($pk, $writer, $title, $content, $submit));
    }
}