<?php

/**
 * @author  Филиппов Роман
 *
 * Класс для работы с базой данных (дескриптор подключения, отправка запросов, обработка результатов..)
 *
 *
 */


class DB{
	/**
     *
     * @var class* хранит ссылку на единственный экземпляр класса
     */
	protected static $instance;
	/**
     *
     * @var array хранит результат запроса
     */
	public $dataset="";
	/**
     *
     * @var string хранит текущую строку запроса
     */
	public $record="";
	/**
     *
     * @var pointer хранит дескриптор подключения к базе данных
     */
	private $link;
	/**
     * копирование экземпляра класса (запрещено)
     *
     *
     */
	private function __clone(){}
	private function __wakeup(){}
	/**
     * Конструктор класса
     *
     */
	private function __construct(){
            //$this->link = mysql_connect(DB_HOST.':'.DB_PORT, PRIVATE_LOGIN, PRIVATE_PASS) or exit("Could not connect");
            $this->link = new mysqli(DB_HOST, PRIVATE_LOGIN, PRIVATE_PASS, DB_USING, DB_PORT);
            $this->link->set_charset(SITE_ENC);
            if ($this->link->connect_errno) {
					throw new Exception($this->link->connect_error);
				}
    }	// Защищаем от создания через new Singleton
    /**
     * Деструктор класса
     *
     */
    function __destruct(){
            $this->link->close();	//Закрываем подключение к БД
            $this->link = NULL;
    }
    /**
     * функция для обращения к экземпляру класса
     *
     *
     * @return DB ссылка на экземпляр класса
     *
     */
    public static function getInstance() {
            if ( is_null(self::$instance) ) {
                    self::$instance = new DB;
            }

            return self::$instance;
    }

	 /**
     * Отправляет запрос и возвращает результат
     *
     * @param   string  $query - строка запроса
     * @return  array - данные запроса
     *
     */
    function Query($query){
            $this->dataset = $this->link->query($query) or die("Internal Error: ".$this->link->error);
            // отправляем запрос в базу и сохраняем результат, иначе вызываем ошибку.
            return $this->dataset; 		//возвращаем результат
    }
	 /**
     * Считывает следующую строчку из результата запроса
     * и помещает её в переменную record
     *
     * @return  bool - конец запроса
     *
     */
    function Next(){
            if($this->record = mysqli_fetch_array($this->dataset)){
                    return TRUE;
            }
            else{
                    return FALSE;
            }
    }
    /**
     * Считывает значение столбца обработанной строки запроса
     *
     *
     * @return value значение выбранного поля по его имени
     *
     */
    function Vall($vall){
            return $this->record[$vall];
    }
	 /**
     * Объединение функций Query, Next, Vall в одну
     *
     *
     * @return value значение выбранного поля по его имени
     *
     */
    function getResult($query,$vall){
            $this->dataset = $this->link->query($query) or die("Internal Error: ".$this->link->errno);
            // посылаем запрос в базу
            $this->Next();// переходим на первую запись
            $ret = $this->Vall($vall);//забираем нужную нам величину
            $this->ClearDataSet();//очищаем запрос
            return $ret;//и возвращаем величину
    }
    /**
     * Количество строк, затронутых запросом
     *
     * @return int количество строк, затронутых запросом.
     *
     */
    function NumRows(){
            return mysqli_num_rows($this->dataset);
    }
	 /**
     * Очищает результат запроса
     *
     */
    function ClearDataSet(){
            mysqli_free_result($this->dataset);   // убиваем наш запрос
    }
}

