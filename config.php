<?php

/*вычисляем имя проекта если оно есть
это имя нужно прибавлять ко всем запрашиваемым файлам
 * */
$project_name = $_SERVER['PHP_SELF'];
$pattern = array('/^\//','/\/*index.php.*$/');
$replacements = '';
define('PROJECT_NAME',preg_replace($pattern,$replacements,$project_name));

// project
define('PROJECT_PATH',$_SERVER['DOCUMENT_ROOT']."/". PROJECT_NAME);
// paths  ---
define('CONTROLLER_PATH',PROJECT_PATH . "/Controllers/");
define('MODELS_PATH',PROJECT_PATH . "/Models/");
define('VIEWS_PATH',PROJECT_PATH . "/Views/");

// controller and model by define
define('DEFINED_CONTROLLER', 'Login');
define('DEFINED_MODEL',"index");

// constants for connection
define('HOST_CONNECTION','localhost');
define('USER_CONNECTION','admin');
define('PSW_CONNECTION','111');
define('BD_CONNECTION','brain');

