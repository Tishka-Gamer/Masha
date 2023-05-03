<?php

namespace App\models;

use App\helpers\Connection;

class Admin
{
    public static function getAdmin($login, $password)
    {
        $query = Connection::make()->prepare("SELECT * FROM administrators WHERE login = ?");
        $query->execute([$login]);
        $admin = $query->fetch();
        if (password_verify($password, $admin->password)) {
            return $admin;            
        } else return null;
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT * FROM administrators WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch();
    }

    public static function findLogin($login)
    {
        $query = Connection::make()->prepare("SELECT * FROM administrators WHERE login = ?");
        $query->execute([$login]);
        $res = $query->fetchAll();
        return !empty($res);
    } 

    public static function insert($data)
    {
        $create = Connection::make()->prepare("INSERT INTO administrators (`name`, `surname`, `patronymic`, `login`, `password`, privilege) VALUES (:name, :surname,  :patronymic, :login, :password, 0 )");
        return $create->execute([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "patronymic" => $data["patronymic"],           
            "login" => $data["login"],          
            "password" => password_hash($data["password"], PASSWORD_DEFAULT),           
        ]);
    }

    public static function delete($id)
    {
        $query = Connection::make()->prepare("DELETE FROM administrators WHERE id = ?");
        return $query->execute([$id]);
    }

    public static function confirmed($conf, $user_id){
        $query = Connection::make()->prepare("UPDATE `users` SET `confirmed` = ?, `updated_at` = NOW() WHERE `users`.`id` = ?");
        $query->execute([$conf, $user_id]);
    }

}