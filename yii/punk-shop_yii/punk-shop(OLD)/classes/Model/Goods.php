<?php

/**
 * Класс Товаров и услуг
 *
 * @author CHROME
 */
class Model_Goods extends Model {

    /**
     * Cодержет в себе всю информацию о правах нашего объекта
     * @var array $grants
     */
    protected static $grants = array(
        'id'          => array('get' => true, 'set' => false, 'default' => null),
        'owner_id'    => array('get' => true, 'set' => false, 'default' => null),
        'date'        => array('get' => true, 'set' => true, 'default' => null),
        'actual'      => array('get' => true, 'set' => true, 'default' => null),
        'category_id' => array('get' => true, 'set' => true, 'default' => null),
        'title'       => array('get' => true, 'set' => true, 'default' => null),
        'description' => array('get' => true, 'set' => true, 'default' => null),
        'price'       => array('get' => true, 'set' => true, 'default' => null),
        'type'        => array('get' => true, 'set' => true, 'default' => null),
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
    public function GetFieldsGoods(){
       return Model::GetFieldsForDB(self::$grants);
    }


}

?>
