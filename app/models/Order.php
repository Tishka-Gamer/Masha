<?php

namespace App\models;

use App\helpers\Connection;


class Order
{
    public static function getAll()
    {
        $query = Connection::make()->query("SELECT orders.id, orders.date, orders.time, CONCAT(specialists.surname, ' ', specialists.name, ' ', specialists.patronymic) as fioSpec, status_id, statuses.name as status, pets.name as pet, CONCAT(users.surname, ' ', users.name, ' ', users.patronymic) as fioUser, services.name as service, services.price, orders.created_at FROM `orders` INNER JOIN specialists ON specialist_id = specialists.id INNER JOIN services ON service_id = services.id INNER JOIN statuses ON status_id = statuses.id INNER JOIN pets ON orders.pet_id = pets.id INNER JOIN users ON pets.user_id = users.id");
        return $query->fetchAll();

       
    }

    public static function insert($data)
    {
        $create = Connection::make()->prepare(" INSERT INTO orders (date, time, specialist_id, status_id, pet_id, service_id, created_at) VALUES (:date, :time, :spec, '1', :pet, :service, NOW())");

        return $create->execute([
            "date" => $data["date"],
            "time" => $data["time"],
            "spec" => $data["spec"],
            "pet" => $data["pet"],
            "service" => $data["service"],
        ]);
    }

    //занятое время
    public static function getTimeBySpec($spec, $date){
        $query = Connection::make()->prepare("SELECT orders.time FROM orders WHERE specialist_id = ? AND orders.date = ?");
        $query->execute([$spec, $date]);
        return $query->fetchAll();
    }

    public static function getAllStatuses(){
        $query = Connection::make()->query("SELECT * FROM statuses");
        return $query->fetchAll();
    }

    public static function createStatusByOrder($order_id, $status_id){
        $query = Connection::make()->prepare("UPDATE orders SET status_id = ? WHERE orders.id = ?");
        $query->execute([$status_id, $order_id]);
        return Connection::make()->lastInsertId();
    }

    public static function delOrdersByService($serv){
        $query = Connection::make()->prepare("DELETE FROM orders WHERE `orders`.`service_id` = ?");
        $query->execute([$serv]);
        
    }

    public static function delOrdersBySpec($spec){
        $query = Connection::make()->prepare("DELETE FROM orders WHERE `orders`.`specialist_id` = ?");
        $query->execute([$spec]);
        
    }

    public static function getFutureOrdersByUser($id){
        $query = Connection::make()->prepare("SELECT orders.id, orders.date, orders.time, services.name as service, pets.name as pet, statuses.name as status FROM `orders` INNER JOIN services ON orders.service_id = services.id INNER JOIN pets ON orders.pet_id = pets.id INNER JOIN statuses ON orders.status_id = statuses.id WHERE orders.status_id = 1 AND pets.user_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public static function getLastOrdersByUser($id){
        $query = Connection::make()->prepare("SELECT orders.id, orders.date, orders.time, services.name as service, pets.name as pet, statuses.name as status FROM `orders` INNER JOIN services ON orders.service_id = services.id INNER JOIN pets ON orders.pet_id = pets.id INNER JOIN statuses ON orders.status_id = statuses.id WHERE orders.status_id BETWEEN 2 AND 3 AND pets.user_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }

    
}
