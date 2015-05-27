<?php

require_once('config.php');
require_once('Controllers/BaseController.php');
require_once('Models/BaseModel.php');
require_once('Application/Request.php');
require_once('Application/Router.php');
require_once('Models/User.php');
require_once('Models/AccountModel.php');
require_once('Models/ExerciseModel.php');

try{
    Router::getPage();
} catch ( Exception $e ){
    die($e->getMessage());
}

