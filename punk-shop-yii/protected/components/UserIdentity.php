<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{ 

    private $_id;
     /**
    * мы используем класс User для поиска строки в таблице Users,
    * в которой значение поля name такое же, как полученное имя пользователя 
    * без учета регистра.
    * @return type error code
    */
    public function authenticate()
    {
        //$this->username , password текущие введенные
        $username=strtolower($this->username);
        $user=Users::model()->find('LOWER(name)=?',array($username));//?
        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!$user->validatePassword($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$user->id;
            $this->username=$user->name;
            $this->errorCode=self::ERROR_NONE;
        }
      
        return $this->errorCode==self::ERROR_NONE;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}
