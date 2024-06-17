<?php

class Was_Form extends Zend_Form {
    /**
     *
     * {@inheritDoc}
     * @see Zend_Form::init()
     */
    public function init()
    {
        $this->setElementDecorators($decorators);
    }
}

