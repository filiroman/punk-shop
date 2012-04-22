<?php
/**
 * Базовый класс всех моделей
 *
 * @author CHROME
 */
class Model {
    /**
     * Массив с внутренними значениями нашего класса
     *
     * @var array
     */
    protected $data = array();
    /**
     * Инициализирует наш класс, будет вызыватьcz из производных классов
     *
     * цикл по $grants с целью выявить есть ли его ключи в $args
     * если ключ есть - то добавляем в $data ключ ->  значение $args[ключ]
     * если - нет - но есть default value - то добавляем ключ -> default value
     *
     * @param array $args данные, которыми будем инициализировать наш объект
     * @param array $grants масссив прав из дочернего класса, с которым будем сравнивать
     */
    public function Init(array $args = array(), array $grants) {
        
        foreach($grants as $key =>$value){
            if (array_key_exists($key, $args)){
                $this->data[$key] = $args[$key];
            }
            else {
                $this->data[$key]=$grants[$key]['default'];
            }
        }
    }

    /**
     * Стандартный геттер
     * Если не находим искомое значение - то выдаем исключение
     * Если не прав на получение - выдаем исключение
     *
     * @param string $name название свойства, которе хотим получить
     * @return  string  возвращаем если нашли
     */
    public function __get($name) {

        if(array_key_exists($name, $this->data)){
                if($this::$grants[$name]['get']==true){
                    return $this->data[$name];
                }
                else throw new Exception("Нет прав для просмотра");
        }
        else {
            throw new Exception("Запрашиваемый элемент отсутсвует");
        }

    }

    /**
     * Стандартный сеттер
     * Если не прав на получение - выдаем исключение
     * Если не находим искомое значение - то выдаем исключение
     *
     * @param string $name искомое свойство
     * @param type $value значение свойства
     */
    public function __set($name, $value) {
        if($this::$grants[$name]['set']==true){
            if(array_key_exists($name, $this->data)){
                $this->data[$name]=$value;
            }
            else throw new Exception("Невозможно записать значение");
        }
        else throw new Exception("Нет прав на запись");
    }

    /**
     * Получить все данные одним массивом
     * пробегается по grants, находит нужные поля и достает значения по $data
     *
     * @return  array  наши данные(key=>value , id=>23)
     */
    public function GetFieldsForDB($grants){
        $accum=array();
        foreach ($grants as $key => $value) {
            $accum[$key]=$this->data[$key];
        }
        return $accum;
    }
}
?>
