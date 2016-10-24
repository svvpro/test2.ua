<?php

/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 24.10.2016
 * Time: 20:02
 */
class UserController
{
    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';

        $result = false;

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)){
                $errors[] = 'Имя должно быть больше 3-х символов';
            }

            if (!User::checkPassword($password)){
                $errors[] = 'Пароль должен быть больше 5-х символов';
            }

            if (!User::checkEmail($email)){
                $errors[] = 'Некорректный email';
            }

            if (User::emailExists($email)){
                $errors[] = 'Указанный email уже зарегестрирован';
            }

            if ($errors == false){
                $result = User::register($name, $email, $password);
            }
        }

        require_once ROOT.'/../views/user/register.php';
        return true;
    }

    public function actionLogin()
    {

        $email = '';
        $password = '';

        $result = false;

        if (isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkPassword($password)){
                $errors[] = 'Пароль должен быть больше 5-х символов';
            }

            if (!User::checkEmail($email)){
                $errors[] = 'Некорректный email';
            }

            $userId = User::checkUserData($email, $password);

            if ($userId  == false) {
                $errors[] = 'Неверный параметры для входа';
            }else{
                User::auth($userId);
                header("Location: /cabinet/");
            }
        }

        require_once ROOT.'/../views/user/login.php';
        return true;
    }

    public function actionLogout()
    {
        if ($_SESSION['user']){
            unset($_SESSION['user']);
            header("Location: /");
        }
    }
}