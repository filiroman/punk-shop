<?php

define('ROOT_DIR', dirname(__FILE__) . '/public_html/');
define('CONFIG_DIR', dirname(__FILE__) . '/config/');
define('CLASSES_DIR', dirname(__FILE__) . '/classes/');

require CONFIG_DIR . 'common.php';
require CONFIG_DIR . 'private.php';

/**
 *Наш автолоадер
 * Для его работы необходимо строго соблюдать именование и расположение классов
 * Model_ClassName для классов Model
 * Factory_ClassName для классов Factory
 */
 spl_autoload_register ('autoload');
  function autoload ($className) {
	$fileName = str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        $fileName = CLASSES_DIR.$fileName;
        include $fileName;
  }