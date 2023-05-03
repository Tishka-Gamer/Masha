<?php

namespace App\models;

use App\helpers\Connection;


class Service
{

    public static function getAll()
    {
        $query = Connection::make()->query("SELECT services.id as service_id, services.name, services.description as descript_service, price, types_of_services.name as type FROM services INNER JOIN types_of_services ON type_of_service_id = types_of_services.id ");

        return $query->fetchAll();
    }

    public static function get5ByServices()
    {
        $query = Connection::make()->query("SELECT services.id as service_id, services.name, types_of_services.name as type FROM services INNER JOIN types_of_services ON type_of_service_id = types_of_services.id ORDER BY services.id LIMIT 5");

        return $query->fetchAll();
    }

    public static function getServicesByType($type)
    {
        $query = Connection::make()->prepare("SELECT services.id as service_id, services.name, services.description as descript_service, price, types_of_services.name as type FROM services INNER JOIN types_of_services ON type_of_service_id = types_of_services.id WHERE type_of_service_id = :type ");

        $query->execute(["type" => $type]);

        return $query->fetchAll();
    }

    public static function find($id){

        $query = Connection::make()->prepare("SELECT services.id as id, services.name as name, services.description as description, types_of_services.name as type, services.type_of_service_id, services.price FROM services INNER JOIN types_of_services ON type_of_service_id = types_of_services.id WHERE services.id = ?");

        $query->execute([$id]);

        return $query->fetch();
    }

    public static function redacte($data){

        $query = Connection::make()->prepare("UPDATE `services` SET `name` = :name, `description` = :desc, `price` = :price, `type_of_service_id` = :type WHERE id = :id");

        $query->execute([
            "name" => $data["name"],
            "desc" => $data["desc"],
            "type" => $data["type"],
            "price" => $data["price"],
            "id" => $data["id"]
        ]);

        return $query->fetch();
    }

    public static function insert($data){

        $query = Connection::make()->prepare("INSERT INTO `services` SET `name` = :name, `description` = :desc, `price` = :price, `type_of_service_id` = :type ");

        $query->execute([
            "name" => $data["name"],
            "desc" => $data["desc"],
            "type" => $data["type"],
            "price" => $data["price"],
          
        ]);

        return $query->fetch();
    } 

    public static function del($id){

        $query = Connection::make()->prepare("DELETE FROM services WHERE `services`.`id` = ?");

        $query->execute([$id]);

        return $query->fetch();
    }

    



    public static function getIdTypeOfService($id){
        $query = Connection::make()->prepare("SELECT type_of_service_id as type_id FROM services WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch()->type_id;
    }

    public static function getServicesBySpec($idSpec){
        $query = Connection::make()->prepare("SELECT services.id as id, services.name, services.description, price 
        FROM services 
        INNER JOIN types_of_services ON type_of_service_id = types_of_services.id
        INNER JOIN specialists ON types_of_services.id = specialists.type_services_id WHERE specialists.id = ?");

        $query->execute([$idSpec]);

        return $query->fetchAll();
    }

}