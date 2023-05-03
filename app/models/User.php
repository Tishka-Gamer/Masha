<?php

namespace App\models;

use App\helpers\Connection;


class User
{
    public static function getUser($login, $password)
    {
        $query = Connection::make()->prepare("SELECT * FROM users WHERE users.login = :login");
        $query->execute([':login' => $login]);
        $user = $query->fetch();
        if (password_verify($password, $user->password)) {
            return $user;
        } else return null;
    }

    public static function getUserByLogin($login)
    {
        $query = Connection::make()->prepare("SELECT * FROM users WHERE users.login = :login");
        $query->execute([':login' => $login]);
        $user = $query->fetch();
        return $user;
       
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT users.id, users.name, users.surname, users.patronymic, users.date_birth as birth, CONCAT(users.name,' ', users.surname, ' ',users.patronymic) as fio, DATEDIFF( CURRENT_DATE(), users.date_birth) DIV 365 as age, users.email, users.login, users.image FROM users WHERE users.id = ?");
        $query->execute([$id]);
        return $query->fetch();
    }

    public static function getAll()
    {

        $query = Connection::make()->query("SELECT users.id , CONCAT(users.name,' ', users.surname, ' ',users.patronymic) as fio, users.email, users.login, confirmed, created_at, DATEDIFF( CURRENT_DATE(), users.date_birth) DIV 365 as age FROM users ");
        return $query->fetchAll();
    }



    public static function insert($data)
    {
        $create = Connection::make()->prepare("INSERT INTO `users` (`name`, `surname`, `patronymic`, `image`, `login`, `email`, `password`, `date_birth`, `confirmed`, `created_at`) VALUES (:name, :surname,  :patronymic, :image , :login, :email, :password, :birth, '0', NOW()) ");
        return $create->execute([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "patronymic" => $data["patronymic"],
            "image" => $data["image"],
            "login" => $data["login"],
            "email" => $data["email"],
            "password" => password_hash($data["password"], PASSWORD_DEFAULT),
            "birth" => $data["birth"],
        ]);
    }

    public static function redacte($data, $id)
    {
        $create = Connection::make()->prepare("UPDATE `users` SET `name` = :name, `surname` = :surname, `patronymic`= :patronymic, `image` = :image, `login` = :login, `email` = :email, `password` = :password, `date_birth` =  :birth, `updated_at` = NOW() WHERE id = :id");
        return $create->execute([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "patronymic" => $data["patronymic"],
            "image" => $data["image"],
            "login" => $data["login"],
            "email" => $data["email"],
            "password" => password_hash($data["password"], PASSWORD_DEFAULT),
            "birth" => $data["birth"],
            "id" => $id
        ]);
    }

    public static function redacteNotPassword($data, $id)
    {
        $create = Connection::make()->prepare("UPDATE `users` SET `name` = :name, `surname` = :surname, `patronymic`= :patronymic, `image` = :image, `login` = :login, `email` = :email, `date_birth` =  :birth, `updated_at` = NOW() WHERE id = :id");
        return $create->execute([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "patronymic" => $data["patronymic"],
            "image" => $data["image"],
            "login" => $data["login"],
            "email" => $data["email"],
            "id" => $id,
            "birth" => $data["birth"],
        ]);
    }

    public static function delete($id)
    {
        $query = Connection::make()->prepare("DELETE FROM users WHERE id = ?");
        return $query->execute([$id]);
    }

    public static function findLogin($login)
    {
        $query = Connection::make()->prepare("SELECT users.id ,users.name, login, users.email FROM users WHERE users.login = ?");
        $query->execute([$login]);
        $res = $query->fetchAll();
        return !empty($res);
    }

    public static function findEmail($email)
    {
        $query = Connection::make()->prepare("SELECT users.id ,users.name, login, users.email FROM users WHERE users.email = ?");
        $query->execute([$email]);
        $res = $query->fetchAll();
        return !empty($res);
    }

    public static function getLogins()
    {
        $query = Connection::make()->query("SELECT users.login FROM users ");


        return $query->fetchAll();
    }

    //здесь размещаем все методы для работы с таблицей users
}
