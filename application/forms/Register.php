<?php

class Application_Form_Register extends Zend_Form
{

    public function init()
    {
        $this->setName('register');
        $this->setAttrib('class', 'register-form');
        $isEmptyMessage = 'Value is required and can\'t be empty!';

        $firstName = new Zend_Form_Element_Text('firstName');
        $firstName->setAttrib('placeholder', 'First name')
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true, array('messages' => array('isEmpty' => $isEmptyMessage)));

        $lastName = new Zend_Form_Element_Text('lastName');
        $lastName->setAttrib('placeholder', 'Last name')
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true, array('messages' => array('isEmpty' => $isEmptyMessage)));

        $email = new Zend_Form_Element_Text('email');
        $email->setAttrib('placeholder', 'Enter your email')
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true, array('messages' => array('isEmpty' => $isEmptyMessage)));

        $password = new Zend_Form_Element_Password('password');
        $password->setAttrib('placeholder', 'Password')
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true, array('messages' => array('isEmpty' => $isEmptyMessage)));

        $submit = new Zend_Form_Element_Submit('Register');
        $submit->setAttrib('class', 'register-btn');

        $this->addElements(array($firstName, $lastName, $email, $password, $submit));
        $this->setMethod('post');

    }
}

