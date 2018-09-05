<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        $this->view->headTitle('Login');

        $form = new Application_Form_Login();
        $this->view->form = $form;

        if($this->getRequest()->isPost())
        {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
                $authAdapter->setTableName('users')
                            ->setIdentityColumn('email')
                            ->setCredentialColumn('password');

                $email = $this->getRequest()->getPost('email');
                $password = $this->getRequest()->getPost('password');

                $authAdapter->setIdentity($email)
                            ->setCredential(md5($password));

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);

                if($result->isValid())
                {
                    $identity = $authAdapter->getResultRowObject();
                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);
                    $this->_helper->redirector->gotoRoute(array('controller'=>'auth','action'=>'index'));
                }
                else
                {
                    $this->view->errMessage = 'Invalid username or password';
                }
            }
        }
    }

    public function registerAction()
    {
        if (Zend_Auth::getInstance()->hasIdentity())
            $this->_helper->redirector->gotoRoute(array('controller' => 'auth', 'action' => 'index'));

        $this->view->headTitle('Register');

        $form = new Application_Form_Register();
        $this->view->form = $form;

        if($this->getRequest()->isPost())
        {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $firstName = $this->getRequest()->getPost('firstName');
                $lastName = $this->getRequest()->getPost('lastName');
                $email = $this->getRequest()->getPost('email');
                $password = $this->getRequest()->getPost('password');

                $table = new Application_Model_DbTable_Users();
                $table->registerUser($firstName, $lastName, $email, md5($password));

                $this->_helper->redirector->gotoRoute(array('controller' => 'auth', 'action' => 'index'));
            }
        }
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector->gotoRoute(array('controller' => 'index', 'action' => 'index'));
    }


}







