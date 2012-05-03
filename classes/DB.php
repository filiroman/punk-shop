<?php

/**
 * @author  
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
            $this->link = mysql_connect(DB_HOST.':'.DB_PORT, PRIVATE_LOGIN, PRIVATE_PASS) or exit("Could not connect");
                    //соединяемся с базой
            //mysql_select_db($this->db, );//убрал пока, чтобы не ругался на ошибки (Евгений)
            mysql_select_db(DB_USING,$this->link);
                    //выбираем базу данных
            //mysql_query("SET CHARSET " . $this->enc, );//убрал пока, чтобы не ругался на ошибки (Евгений)
            mysql_query("SET CHARSET " . SITE_ENC,$this->link);
                    //устанавливаем нашу кодировку

    }	// Защищаем от создания через new Singleton
    /**
     * Деструктор класса
     *
     */
    function __destruct(){
            mysql_close($this->link);	//Закрываем подключение к БД
            $this->link = "";
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
    public function Query($query){
            $this->dataset = mysql_query($query) or die("Internal Error: ".mysql_error());
            // отправляем запрос в базу и сохраняем результат, иначе вызываем ошибку.
            return $this->dataset; 		//возвращаем результат
    }
   /**
    * Запрос на вставку данных
    *	@param	string $table - таблица для вставки
    *	@param	array $fields - значения полей(ассоциативный)
    * @return	int mysql_insert_id() - id последней вставленной записи
    *
    */
    public function Insert($table,$fields){
         echo '<br>Inserting user'.$fields['login'];
         $ValueQuote= create_function('$key','return "\'".$key."\'";');
         $KeyQuote= create_function('$key','return "`".$key."`";');
         $result= sprintf('INSERT INTO %s (%s) VALUES (%s)', "`".$table."`",
                implode(', ', array_map($KeyQuote, array_keys($fields))),
                implode(', ', array_map($ValueQuote, $fields)));

         echo "<br>".$result."<br>";
         $this->Query($result);
         return mysql_insert_id();
         
        // return $result;
         //return именно наш $result? ид записи не надо(тк. см Users.php). вообще правильно засунул в бд?
         //или запрос делаем тоже в Insert ?
         
    }
    //Функция implode;
   /**
    * Запрос на обновление данных
    *	@param	string $table - таблица для обновления
    *	@param	array $fields - значения полей(ассоциативный)
    * 0 => 'key1' = 'value1'
    * 1 => 'key2' = 'value2'
    *	@param	array $where - значения условий WHERE(ассоциативный)
    * @return	int - количество строк, затронутых запросом
    *
    */
    public function Update($table,$fields,$where){
    	echo '<br>Updating user'.$fields['login'];
        $result= sprintf('UPDATE %s set %s where %s', "`".$table."`",
             implode(', ', array_map(function ($res_val,$res_key){return "`".$res_key."`"."="."'".$res_val."'";},  $fields,  array_keys($fields))),
             implode(' AND ', array_map(function ($res_val,$res_key){return "`".$res_key."`"."="."'".$res_val."'";},  $where, array_keys($where)))); 
        


         echo "<br>".$result."<br>";
         $this->Query($result);
         
         //array_map (function ($rez){return "`".array_keys($rez)."`"."="."'".$rez."'";}, $fields)
         
        
       
    }
    
    
    
    /**
     * Проверка существования записи по значению поля (единственное условие)
     * 
     * @param type $table таблица, в которой проверяем наличие.
     * @param type $condition ассоциативный массив, по первой паре ключ - значение которого ищем строку.
     * @return	bool true - запись существует, false - не существует или такой запрос некорректен.
     */
    public function Exists($table,$condition){
        $keys = array_keys($condition);
        $values = array_values($condition);      
        $this->Query('select '.$keys[0].' from `'.$table.'` where '.$keys[0].'= '."'".$values[0]."'");
        $result = $this->AffRows(); //сколько строчек затронуто запросом
        if($result==0 || $result==-1){
            if ($result==0) echo 'No such items found. <br>';
            if ($result==-1) echo 'Query with that parameters failed. <br>'; //Если запрос сфейлился
            return false; 
            }
        else {
            echo 'Such item exists in quantity of '.$result.'. <br>';
            return true;
            }
    }
    
	 /**
     * Считывает следующую строчку из результата запроса
     * и помещает её в переменную record
     *
     * @return  bool - конец запроса
     *
     */
    function Next(){
            if($this->record = mysql_fetch_array($this->dataset,MYSQL_ASSOC)){
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
            $this->dataset = mysql_query($query) or die("Internal Error: ".mysql_error());
            // посылаем запрос в базу
            $this->Next();// переходим на первую запись
            $ret = $this->Vall($vall);//забираем нужную нам величину
            $this->ClearDataSet();//очищаем запрос
            return $ret;//и возвращаем величину
    }
    /**
     * Идентификатор, сгенерированный полем AUTOINCREMENT запроса
     *
     * @return int Идентификатор, сгенерированный последним INSERT - запросом.
     *
     */
    function LastID(){
    			return mysql_insert_id();
    }
    /**
     * Количество строк, затронутых запросом
     *
     * @return int количество строк, затронутых(обновленных) последним запросом.
     *
     */
    function AffRows(){
    			return mysql_affected_rows($this->link);
    }
    /**
     * Количество строк, возвращенных запросом
     *
     * @return int количество строк, возвращенных последним запросом.
     *
     */
    function NumRows(){
            return mysql_num_rows($this->dataset);
    }
	 /**
     * Очищает результат запроса
     *
     */
    function ClearDataSet(){
            $this->dataset = "";// убиваем наш запрос
    }
}

