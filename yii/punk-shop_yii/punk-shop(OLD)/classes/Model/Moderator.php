<?php

/**
 * Класс Модераторов
 *
 * @author CHROME
 */
class Model_Moderator extends Model_Users {

    /**
     * Cодержет в себе всю информацию о правах нашего объекта
     * @var array $grants
     */
     protected static $grants = array(
        'perm_level' => array('get' => true, 'set' => false, 'default' => 'Moderator')
     );

     /**
     * Конструктор класса
     *
     * @param array $args масиив данных для создания
     */
     public function __construct(array $args = array()) {
        parent::__construct($args);
        $this->Init($args, self::$grants);

     }

    //##########################################################################
     //Изменение пользователей
    //##########################################################################
     /**
     * Смена данных(email,pass,name,phone,about) у юзера c $id
     *
     */

    public function ChangeData($id) {
           //логика(меняем name в $data на новый), вызываем методы Factory (save) - сохраняем в бд ;
    }

    /**
     * Смена картинки у юзера c $id
     *
     */

    public function ChangePic($id) {
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
     * Смена пароля у юзера c $id
     *
     */
    public function ChangePassword($id) {
       //логика(меняем пароль в $data на новый), вызываем методы Factory (save) - сохраняем в бд ;
    }

     /**
      * Возращает текущие права(по идее всегда совпадает с именем класса и данная функция не нужна,
      * поэтому пока закоментирую)
      *
      * @return array наши данные(key=>value )
      */

//    public function GetFieldstsGrantsForDB(){
//       return Model::GetFieldsForDB(self::$grants);
//    }

    //##########################################################################
    //Изменение(удаление) объявлений
    //##########################################################################
    /**
      * Изменяем наше объявление
      *
      * @param int $id какое объявление меняем(потребуется проверка)
      * @param array $info инормация для изменения
      */
     public function ChangeGoods($id_good, $info) {
         //Поиск в бд нужного объявления(use factory) по id?
         //(потребуется проверка на принадлежность)
         //new Goods($info)
         //обращаемся к Factory гудсу для сохранения ::save
         //+причина
     }
     /**
      * Удаляем заданное объявление
      *
      * @param int $id информация для заполения
      */

     public function DeleteGoods($id_good) {
         //(потребуется проверка на принадлежность)
         //Удаление в бд нужного объявления(use factory) по id?
         //+причина
     }
     /**
      * Возращает текущие права(по идее всегда совпадает с именем класса и данная функция не нужна,
      * поэтому пока закоментирую)
      *
      * @return array наши данные(key=>value )
      */
     //ВОЗМОЖНО НЕ ПОНАДОБИТСЯ? пока предлагаю забить
    //##########################################################################
    //Категории
    //##########################################################################
     /**
      *Создание новой категории
      */
     public function CreateCategory() {
         ;
     }

     /**
      * Изменение категории
      * @param int $id_cathegory
      * @param ? $changes
      */
     public function ChangeCategory($id_cathegory,$changes) {
         ;
     }

     /**
      * Удаление категории
      * @param int $id_cathegory
      */
     public function DeleteCategory($id_cathegory) {
         ;
     }
}

?>
