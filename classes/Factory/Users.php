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
//        $test=array('lastName' => 'petrash');
//        $this->db->Exists("Users", $test);
        if($res['id']===null){
          if($this->findByLogin($res['login'])!==null)
              throw new Exception('this login already exist');
          else {
            echo "<br>Creating new User".$res['firstName']."<br>";
            //вставляем результат в Users и возвращаем последний id
            $lastId=$this->db->Insert("Users", $res);
            
            //не забываем присвоить объекту отсутсвующий id
            echo "<br> newID=$lastId";
            if($newID==0){
                throw new Exception("autoincriment error: mysql_insert_id()==0");
            }
            else{
                $user->ChangeID($lastId);
            }
            echo 'Succes! Add new user<br>';
            return true;//создали
          }
        }
        else{
           $this->db->Update("Users", $res, array("id"=>$res['id'],"login"=>$res['login']));
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
