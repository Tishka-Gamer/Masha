<?php

namespace App\models;

use App\helpers\Connection;


class Pet
{

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT pets.id as pet_id, pets.name as pet_name, pets.date_birth as birth, pets.image, species.name as specie, breed, DATEDIFF( CURRENT_DATE(), pets.date_birth) DIV 365 as pet_age, gender, specie_id, users.name as user FROM pets INNER JOIN species ON specie_id = species.id INNER JOIN users ON user_id = users.id WHERE pets.id = :id");

        $query->execute([':id' => $id]); 

        return $query->fetch();

        
    }

    public static function getPetsUser($id)
    {
        $query = Connection::make()->prepare("SELECT pets.id as pet_id, pets.name as pet_name, pets.image as pet_image, species.name as specie, breed, DATEDIFF( CURRENT_DATE(), pets.date_birth) DIV 365 as pet_age, gender, users.login as user FROM pets INNER JOIN species ON specie_id = species.id INNER JOIN users ON user_id = users.id  WHERE user_id =:id");

        $query->execute([':id' => $id]);

        return $query->fetchAll();

        
    }

    public static function getPetImg($id)
    {
        $query = Connection::make()->prepare("SELECT pets.id, pets.image FROM pets WHERE id =:id");

        $query->execute([':id' => $id]);

        return $query->fetch();

        
    }



    public static function getAll()
    {

        $query = Connection::make()->query("SELECT users.id , CONCAT(users.name,' ', users.surname, ' ',users.patronymic) as fio, users.email FROM users ");

        return $query->fetchAll();
    }



    public static function insert($data)
    {
        $create = Connection::make()->prepare("INSERT INTO `pets` (`name`, `image`, `specie_id`, `breed`, `date_birth`, `gender`, `user_id`) VALUES (:name, :image, :specie, :breed, :birth, :gender, :user_id)");

        return $create->execute([
            "name" => $data["name"],
            "user_id" => $data["user_id"],
            "specie" => $data["specie"],
            "image" => $data["image"],
            "breed" => $data["breed"],
            "gender" => $data["gender"],
            
            "birth" => $data["birth"],
        ]);
    }

    public static function redacte($data, $id)
    {
        $create = Connection::make()->prepare("UPDATE `pets` SET `name` = :name, `image` = :image, `specie_id` = :specie, `breed` = :breed, `date_birth` = :birth, `gender` = :gender WHERE id = :id");

        return $create->execute([
            "name" => $data["name"],
            "id" => $id,
            "specie" => $data["specie"],
            "image" => $data["image"],
            "breed" => $data["breed"],
            "gender" => $data["gender"],
            
            "birth" => $data["birth"],
        ]);
    }


    public static function delete($id)
    {
        $query = Connection::make()->prepare("DELETE FROM pets WHERE id = ?");

        return $query->execute([$id]);
    }

   
    //здесь размещаем все методы для работы с таблицей users
}
