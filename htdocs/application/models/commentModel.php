<?php

namespace application\models;

use application\core\Model;
use PDO;

class commentModel extends Model {

    protected $name;
    protected $mail;
    protected $text;

    public static function Add($name,$mail,$text){

        $db = new PDO('mysql:host=localhost:3306;dbname=my_db','root', 'password');


        $sql = "INSERT INTO comment (name, mail, text)
        VALUES ('".$name."','".$mail."','".$text."')";
        return  $db ->exec($sql);
    }

}