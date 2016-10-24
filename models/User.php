<?php

/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 24.10.2016
 * Time: 20:05
 */
class User
{
    public static function checkName($name)
    {
        if (strlen($name) >= 3){
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 5){
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    public static function emailExists($email)
    {
        $db = DB::getConnection();
        $sql = "SELECT * FROM `user` WHERE `email` = :email";
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()){
            return true;
        }

        return false;
    }

    public static function register($name, $email, $password)
    {
        $role = 'user';
        $db = DB::getConnection();

        $sql = "INSERT INTO `user` (`name`, `email`, `password`, `role`) VALUES (:name, :email, :password, :role)";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':role', $role, PDO::PARAM_STR);
        $result->execute();

        return  $result->execute();
    }

    public static function checkUserData($email, $password)
    {
        $db = DB::getConnection();
        $sql = "SELECT `id` FROM `user` WHERE `email` = :email AND `password` = :password";
        $result = $db->prepare($sql);
        $result->bindParam('email', $email, PDO::PARAM_STR);
        $result->bindParam('password', $password, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();

        return $user['id'];
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function getUserById($userId)
    {
        $userId = intval($userId);

        $db = DB::getConnection();

        $sql = "SELECT * FROM `user` WHERE `id` = :userId ";
        $result = $db->prepare($sql);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }

    public static function checkLogged()
    {
        if (isset($_SESSION['user'])){
            return $_SESSION['user'];
        }else{
            header("Location: /user/login/");
        }
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])){
            return false;
        }
        return true;
    }

    public static function edit($id, $name, $password)
    {
        $role = 'user';
        $db = DB::getConnection();

        $sql = "UPDATE `user` SET `name` = :name, `password` = :password WHERE `id` = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->execute();

        return  $result->execute();
    }

}