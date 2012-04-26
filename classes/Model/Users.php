<?php
/**
 *Базовый класс моделей пользователей
 */

class Model_Users extends Model {
    /**
     * Cодержет в себе всю информацию о правах нашего объекта
     * @var array $grants
     */
    protected static $grants = array(
        'id' => array('get' => true, 'set' => false, 'default' => null),
        'email' => array('get' => true, 'set' => false, 'default' => null),
        'pass' => array('get' => false, 'set' => false, 'default' => null),
        'name' => array('get' => true, 'set' => true, 'default' => null),
        'phone' => array('get' => true, 'set' => true, 'default' => null),
        'user_pic' => array('get' => true, 'set' => true, 'default' => null),
        'about' => array('get' => true, 'set' => true, 'default' => null)
    );

    /**
     * Конструктор класса принимает данные для инициализации объектов
     */
    public function __construct(array $args = array()) {
        $args['pass']=hash('md5',$args['pass']);
        $this->Init($args, self::$grants);
    }
    /**
     *Изменение id. Внимание! Неправильное использование может привести к краху...
     * Преполагается что $newID принимает допустимые значения и !=0
     * @param type $newID
     */

    public function ChangeID($newID) {
           $this->data['id'] = $newID;
    }

    /**
     *  Проверка введенного пароля с паролем в экземпляре объекта
     * @param type $password
     * @return boolean
     */
    public function CheckPassword($password) {
    //    $passwordDB=$this->db->getResult('SELECT password from Users WHERE login ='."'$login'", "password");
        $passwordDB=$this->data['password'];
        $passwordHash= hash('md5', $password); // функция преобразоавания нашего пароля в хеш
        if($passwordHash==$passwordDB){
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
     /**
     * Получить все данные одним массивом
     * пробегается по grants, находит нужные поля и достает значения по $data
     *
     * @return  array  наши данные(key=>value , id=>23)
     */

    public function GetFieldsUsersForDB(){
       return Model::GetFieldsForDB(self::$grants);
    }

    /**
     * Смена данных(email,pass,name,phone,about)
     *
     */

    public function ChangeDataItself() {
           //логика(меняем name в $data на новый), вызываем методы Factory (save) - сохраняем в бд ;
    }

    /**
     * Смена картинки
     *
     */

    public function ChangePicItself() {
           //логика(меняем name в $data на новый), вызываем методы Factory (save) - сохраняем в бд ;
    }
    /**
     * Получение хэша пароля
     *
     */
//    public function GetPassHash() {
//        ;
//    }

    /**
     * Смена пароля
     *
     */
    public function ChangePasswordItself() {
       //логика(меняем пароль в $data на новый), вызываем методы Factory (save) - сохраняем в бд ;
    }


    /**
     * Восстановление пароля и логина (на мыло?)
     * Статичная!
     * @param   int     $id - идентификатор записи
     */
    static public function RestorationLoginPassword($login) {
        ;
    }
}