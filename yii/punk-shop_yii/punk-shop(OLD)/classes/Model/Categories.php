<?php

/**
 * Класс Категорий
 *
 * @author CHROME
 */
class Model_Categories extends Model {

    /**
     * Cодержет в себе всю информацию о правах нашего объекта
     * @var array $grants
     */
    protected static $grants = array(
        'id'          => array('get' => true, 'set' => false, 'default' => null),
        'name'        => array('get' => true, 'set' => false, 'default' => null)
    );

     /**
     * Конструктор класса
     *
     * @param array $args масиив данных для создания
     */
    public function __construct(array $args = array()) {
        $this->Init($args, self::$grants);
    }

    /**
     *  Возращает нам данные для текущего товара(услуги)
     * @return array наши данные
     */
    public function GetFieldsCategories(){
       return Model::GetFieldsForDB(self::$grants);
    }


}

?>
