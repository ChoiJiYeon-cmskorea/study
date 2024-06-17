<?php
class Was_Member_Form_Member extends Was_Form {

    /**
     * 
     * {@inheritDoc}
     * @see Zend_Form::init()
     */
    public function init()
    {
        parent::init();
        $this->addElement("Text", "userName", array("label" => "회원명", "placeholder" => "회원명", "class" => "xs-1"));
        
    }
}