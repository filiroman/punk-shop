<?php

/**
 * Класс Продавцов
 *
 * @author CHROME
 */
class Model_Vendor extends Model_Users {

    /**
     * Cодержет в себе всю информацию о правах нашего объекта
     * @var array $grants
     */
     protected static $grants = array(
        'perm_level' => array('get' => true, 'set' => false, 'default' => 'USER'),
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
    /**
     *  Возращает нам данные для текущего продавца
     * @return array наши данные для Продавца
     */
    public function GetFieldsVendor(){
       return Model::GetFieldsForDB(self::$grants);
    }


     /**
      * Создаем  новое объявление
      *
      * @param array $info информация для заполения
      */

     public function CreateGoodsItself($info) {
         //создаем  новое объявление - экземпляр Goods
         //в дальнешем внутри Goods с использованием Factory сохраним его вбд
         //new Goods(info)
         //обращаемся к Factory гудсу для сохранения ::save
         //
     }


     /**
      * Изменяем наше объявление
      *
      * @param int $id какое объявление меняем(потребуется проверка)
      * @param array $info инормация для изменения
      */
     public function ChangeGoodsItself($id_good, $info) {
         //Поиск в бд нужного объявления(use factory) по id?
         //(потребуется проверка на принадлежность)
         //new Goods($info)
         //обращаемся к Factory гудсу для сохранения ::save
         //
     }
     /**
      * Удаляем заданное объявление
      *
      * @param int $id информация для заполения
      */

     public function DeleteGoodsItself($id_good) {
         //(потребуется проверка на принадлежность)
         //Удаление в бд нужного объявления(use factory) по id?
         //
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
}

?>
