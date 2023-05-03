<?php

namespace App\models;

use App\helpers\Connection;


class ServicesType
{

    public static function getAll()
    {
        $query = Connection::make()->query("SELECT id, name, description, image FROM types_of_services ");

        return $query->fetchAll();
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT id, name, description, image FROM types_of_services WHERE id =? ");
        $query->execute([$id]);
        return $query->fetch();
    }

    public static function redacte($data, $image, $id){

        $query = Connection::make()->prepare("UPDATE `types_of_services` SET `name` = :name, `description` = :desc, image = :image WHERE id = :id");

        $query->execute([
            "name" => $data["name"],
            "desc" => $data["desc"],
          
            "image" => $image,
            "id" => $id
        ]);

        return $query->fetch();
    }

    public static function insert($data, $image){

        $query = Connection::make()->prepare("INSERT INTO `types_of_services` (`name`, `description`, `image`) VALUES (:name, :desc, :image);");

        $query->execute([
            "name" => $data["name"],
            "desc" => $data["desc"],        
            "image" => $image,           
        ]);

        // return $query->fetch(); DELETE FROM types_of_services WHERE `types_of_services`.`id` = 6
    }

    public static function del($id){

        $query = Connection::make()->prepare("DELETE FROM types_of_services WHERE `types_of_services`.`id` = ?");

        $query->execute([$id]);

        // return $query->fetch(); 
    }
}

