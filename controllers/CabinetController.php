<?php

/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 24.10.2016
 * Time: 21:28
 */
class CabinetController
{
    public function actionIndex()
    {

        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        require_once ROOT.'/../views/cabinet/index.php';
        return true;
    }

    public function actionEdit()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];

        $result = false;

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)){
                $errors[] = 'Имя должно быть больше 3-х символов';
            }

            if (!User::checkPassword($password)){
                $errors[] = 'Пароль должен быть больше 5-х символов';
            }

            if ($errors == false){
                $result = User::edit($userId, $name, $password);
            }
        }

        require_once ROOT.'/../views/cabinet/edit.php';
        return true;
    }
}