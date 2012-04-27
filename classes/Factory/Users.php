<?php

/**
 * Description of Users
 *
 * @author CHROME
 */
class Factory_Users extends Factory {

    // ==== Singlton go go go ===
    /**
     *
     * @var Factory_Users
     */
    protected static $instance;
    /**
     *
     * @return Factory_Users
     */
    public static function getInstance() {    // Возвращает единственный экземпляр класса. @return Singleton
            if ( is_null(self::$instance) ) {
                    self::$instance = new Factory_Users();
            }
            return self::$instance;
    }

   final private function __clone(){}	// Защищаем от создания через клонирование
   final private function __wakeup(){}
    // ==== Singlton ends ===

    /**
     * Сохраняет данные в БД
     *
     * @param Model_Users $user экземпляр нашего пользователя
     */
        public function Save(Model_Users $user){
        $res = $user->GetFieldsUsersForDB();//получаем массив данных для $user
        if($res['id']===null){
          if($this->findByLogin($res['login'])!==null)
              throw new Exception('this login already exist');
          else {

            echo 'Creating new user '.$res['login'];
            $key_array="";
            $value_array="";
            foreach ($res as $key => $value) {
                $key_array.="$key".",";
                if($value==null){
                    $value_array.="NULL".",";
                }
                else
                $value_array.="'$value'".",";
            }

            $value_array=  trim($value_array, ",");
            $key_array=  trim($key_array, ",");

            //вставляем нашего юзера в таблицу
            
            $this->db->Query("INSERT into `Users` ($key_array) VALUES($value_array)");
            //не забываем присвоить объекту отсутсвующий id
            //извлекаем из бд и записываем в объект
            //
            //$newID=$this->db->getResult("select id from Users where login =".$res['login'],"id");
            $newID=mysql_insert_id();
            echo "<br> newID=$newID";
            if($newID==0){
                throw new Exception("autoincriment error: mysql_insert_id()==0");
            }
            else{
                $user->ChangeID($newID);
            }
            echo 'Succes! Add new user<br>';
          }
        }
        else{
            echo '<br>Changing user'.$res['login'];
            
        $update_array="";
        foreach ($res as $key => $value) {
            if($value==null){
                $update_array.="$key"."="."NULL".",";//defualt!
                //проверка на ошибки
            }
            else
            $update_array.="$key"."="."'$value'".",";
        }
        $update_array=  trim($update_array, ","); 
        echo "<br>";
        //обновляем нашего юзера в таблице
           $this->db->Query("update `Users` set $update_array where `id`=".$res['id']);  
           echo "Update has been successfully";
        }
    }

    /**
     * Функция ищет и возвращает наш объект по полю id
     * Если находи вовзращает его
     * Если не находит , возвращает exception
     *
     * @param int $id
     * @return  Model_Users  наш экземпляр
     */
    public function findByID($id){

        // делаем запрос в бд, извлекаем массив
        $result =$this->db->query('SELECT * from Users WHERE id ='.$id);

        if (!$result) {
         die('Неверный запрос: ' . mysqli_error());
            }
        // если получили ответ и результат 1 строка, то
        if($this->db->next()){
            $user = new Model_Users($this->db->record);
            return $user; //или как то так
        }
        else {
            throw new ExceptionFind("Не удалось найти");
        }
    }
    /**
     * Функция ищет и возвращает наш объект по полю login
     * Если находи вовзращает его
     * Если не находит , возвращает exception
     *
     * @param int $id
     * @return  Model_Users  наш экземпляр
     */
        public function findByLogin($login){

        // делаем запрос в бд, извлекаем массив
        $result =$this->db->query('SELECT * from Users WHERE login ='."'$login'");

        if (!$result) {
         die('Неверный запрос: ' . mysqli_error());
            }
        // если получили ответ и результат 1 строка, то
        if($this->db->next()){
            $user = new Model_Users($this->db->record);
            return $user; //или как то так
        }
        else {
            return null;
        }
    }

}

?>
