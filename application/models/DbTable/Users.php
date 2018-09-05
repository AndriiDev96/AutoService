<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';

    public function registerUser($firstName, $lastName, $email, $password)
    {
        $data = array(
            "first_name" => $firstName,
            "last_name" => $lastName,
            "email" => $email,
            "password" => $password
        );

        $this->insert($data);
    }


}

