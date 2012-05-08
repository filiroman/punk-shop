<?php

/**
 * Description of Factory
 *
 * @author CHROME
 */
class Factory{

    protected $db;


    public function __construct() {
        $this->db = DB::getInstance();
    }

}

?>
