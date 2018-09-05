<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        $this->setName('login');
        $this->setAttrib('class','login-form');
        $isEmptyMessage = 'Value is required and can\'t be empty!';

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

        $submit = new Zend_Form_Element_Submit('Login');
        $submit->setAttrib('class','login-btn');

        $register = new Zend_Form_Element_Button('Register');
        $register->setAttrib('class','register-btn')
            ->setAttrib('onclick', 'window.location.href="/auth/register"');

        $this->addElements(array($email, $password, $submit, $register));
        $this->setMethod('post');
    }
}
