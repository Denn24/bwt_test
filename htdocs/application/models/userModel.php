<?php

namespace application\models;

use application\core\Model;
use PDO;

class userModel extends Model {

    protected $name;
    protected $password;
    protected $surname;
    protected $mail;
    protected $sex;
    protected $birthdate;

   public static function Add($name,$password,$surname,$mail,$sex,$birthdate){
       $newUser = new userModel();
       $newUser->name = $name;
       $newUser->surname = $surname;
       $newUser->mail = $mail;
       $newUser->birthdate = $birthdate;
       $db = new PDO('mysql:host=localhost:3306;dbname=my_db','root', 'password');


       $sql = "INSERT INTO user (name,password,surname,mail,sex,bd_date)
        VALUES ('".$name."','".$password."', '".$surname."','".$mail."','".$sex."','".$birthdate."')";

       return  $db ->exec($sql);
   }

}