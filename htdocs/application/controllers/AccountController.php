<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;
use http\Env\Request;
use PDO;

class AccountController extends Controller
{

    public function loginAction()
    {
        $this->view->render('Вход');
    }

    public function signingAction()
    {

        $login = $_REQUEST['login'];
        $password = $_REQUEST['password'];

        $db = new PDO('mysql:host=localhost:3306;dbname=my_db', 'root', 'password');

        $sql = "SELECT * FROM user WHERE mail = '" . $login . "'";

        $account = $db->query($sql)->fetch();
        if ($account) {
                if ($account['password'] == $password) {
                    $gismeteo = 'https://www.gismeteo.ua/weather-zaporizhia-5093/';
                    $content = file_get_contents($gismeteo);
                    preg_match_all("#<tbody[^>]+?id\s*?=\s*?[\"\']tbwdaily1[\"\'][^>]*?>(.+?)</tbody>#su", $content, $pogodaToday);
                    $button = "<form action=\"http://localhost/comment/comment\" method=\"POST\">
<button>Оставить отзыв</button></b>
</form>";
                    echo implode(' ', $pogodaToday[0]) . $button;

                }

        }
    }

    public function registerAction()
    {
        $this->view->render('Регистрация');
    }

    public function register_new_userAction()
    {

        \application\models\userModel::Add($_REQUEST['name'], $_REQUEST['password'], $_REQUEST['surname'], $_REQUEST['mail'], $_REQUEST['sex'], $_REQUEST['db_date']);


        $this->view->redirect('login');
    }
}