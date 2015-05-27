<?php
/**
 * Created by PhpStorm.
 * User: MiSHa
 * Date: 18.05.2015
 * Time: 12:54
 */

class RegistrationModel extends baseModel
{
    public function getContent($param)
    {
        return array('title' => 'Registration page', 'content' => 'Please, fill in this form:', 'action_path' => 'http://localhost/brain_v1/index.php' );
    }
}