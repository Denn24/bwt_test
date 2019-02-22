<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;
use http\Env\Request;
use PDO;

class CommentController extends Controller
{

    /*public function loginAction() {
        $this->view->render('Вход');
    }*/

    public function commentAction()
    {
        $this->view->render('Добавить комментарий');
    }

    public function register_new_commentAction()
    {

        \application\models\commentModel::Add($_REQUEST['name'], $_REQUEST['mail'], $_REQUEST['text']);


        /* $this->view->redirect('login');*/
        $db = new PDO('mysql:host=localhost:3306;dbname=my_db', 'root', 'password');


        $sql = "SELECT * FROM comment";
        $comments = $db->query($sql);


        $view = '';
        foreach ($comments as $comment) {
            $commentView = '<div style="border: 4px double black">';
            if (isset($comment['name'])) {
                $commentView = $commentView . "<div ><p>Name: " . $comment['name'] . "</p></div>";
            }
            if (isset($comment['mail'])) {
                $commentView = $commentView . "<div ><p>Mail: " . $comment['mail'] . "</p></div>";
            }
            if (isset($comment['text'])) {
                $commentView = $commentView . "<div ><p>Text: " . $comment['text'] . "</p></div>";
            }
            $commentView = $commentView . "</div>";
            $view = $view.$commentView;
        }
        echo $view;


    }
}