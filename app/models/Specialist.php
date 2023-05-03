<?php

namespace App\models;

use App\helpers\Connection;


class Specialist
{
    public static function getAll()
    {
        $query = Connection::make()->query("SELECT specialists.id, CONCAT(specialists.surname, ' ', specialists.name, ' ', specialists.patronymic) as fio, specialists.image, specialists.login, specialists.birth_date, specialists.date_start_work, office, DATEDIFF( CURRENT_DATE(), specialists.date_start_work) DIV 365 as stag, DATEDIFF( CURRENT_DATE(), specialists.birth_date) DIV 365 as age, password, types_of_services.name FROM specialists INNER JOIN types_of_services ON type_services_id = types_of_services.id");
        return $query->fetchAll();
    }

    public static function getShedules(){
        $query = Connection::make()->query(" SELECT * FROM shedules ");
        return $query->fetchAll();
    }

    public static function getShifts (){
        $query = Connection::make()->query(" SELECT * FROM shifts ");
        return $query->fetchAll();
    }

    public static function updateShedule($shift, $id){
        $query = Connection::make()->prepare("UPDATE `shedules` SET `shift_id` = ? WHERE `shedules`.`id` = ?;");
        $query->execute([$shift, $id]);
        
    }

    public static function delShedule($id){
        $query = Connection::make()->prepare("DELETE FROM shedules WHERE `shedules`.`id` = ?");
        $query->execute([$id]);
        
    }

    public static function delSheduleBySpec($id){
        $query = Connection::make()->prepare("DELETE FROM shedules WHERE `shedules`.`specialist_id` = ?");
        $query->execute([$id]);
        
    }

    public static function addShedule($date, $week, $spec_id, $shift){
        $query = Connection::make()->prepare("INSERT INTO `shedules` (`date`, `day_of_week`, `specialist_id`, `shift_id`) VALUES (:date, :week, :spec_id, :shift);");
        $query->execute([
            'date' => $date, 
            'week' => $week, 
            'spec_id' => $spec_id, 
            'shift' => $shift
        ]);
    }    

    public static function getSpecialistsByServicesType($type)
    {
        $query = Connection::make()->prepare("SELECT specialists.id, CONCAT(specialists.surname, ' ', specialists.name, ' ', specialists.patronymic) as fio, specialists.image, specialists.login, specialists.birth_date, DATEDIFF( CURRENT_DATE(), specialists.date_start_work) DIV 365 as stag, DATEDIFF( CURRENT_DATE(), specialists.birth_date) DIV 365 as age,  specialists.date_start_work, office, types_of_services.name FROM specialists INNER JOIN types_of_services ON type_services_id = types_of_services.id WHERE type_services_id = ?");

        $query->execute([$type]);

        return $query->fetchAll();
    }

    public static function getFreeSpecialistsById($id)
    {
        $query = Connection::make()->prepare("SELECT specialists.id, specialists.name, specialists.surname, specialists.patronymic, CONCAT(specialists.surname, ' ', specialists.name, ' ', specialists.patronymic) as fio, specialists.image, specialists.login, specialists.birth_date, specialists.date_start_work, DATEDIFF( CURRENT_DATE(), specialists.date_start_work) DIV 365 as stag, office, DATEDIFF( CURRENT_DATE(), specialists.birth_date) DIV 365 as age, educations.name as diplom, educations.univer, educations.qualification, educations.year_of_issue, educations.year_of_graduation FROM specialists INNER JOIN educations ON specialist_id = specialists.id WHERE specialists.id = ?");

        $query->execute([$id]);

        return $query->fetch();
    }

    
    public static function getSpecialistsById($id)
    {
        $query = Connection::make()->prepare("SELECT specialists.id, specialists.name, specialists.surname, specialists.patronymic, CONCAT(specialists.surname, ' ', specialists.name, ' ', specialists.patronymic) as fio, specialists.image, specialists.login, specialists.birth_date, specialists.date_start_work, DATEDIFF( CURRENT_DATE(), specialists.date_start_work) DIV 365 as stag, office, DATEDIFF( CURRENT_DATE(), specialists.birth_date) DIV 365 as age, types_of_services.name as type, educations.name as diplom, educations.univer, educations.qualification, educations.year_of_issue, educations.year_of_graduation FROM specialists INNER JOIN types_of_services ON type_services_id = types_of_services.id INNER JOIN educations ON specialist_id = specialists.id WHERE specialists.id = ?");

        $query->execute([$id]);

        return $query->fetch();
    }
    //types_of_services.name as type,
    //  INNER JOIN types_of_services ON type_services_id = types_of_services.id

    public static function findLogin($login)
    {
        $query = Connection::make()->prepare("SELECT * FROM specialists WHERE login = ?");
        $query->execute([$login]);
        $res = $query->fetchAll();
        return !empty($res);
    }

    public static function getSpecsByServiceId($serv_id)
    {
        $query = Connection::make()->prepare("SELECT specialists.id, CONCAT(specialists.surname, ' ', specialists.name, ' ', specialists.patronymic) as fio, price FROM specialists 
        INNER JOIN types_of_services ON specialists.type_services_id = types_of_services.id
        INNER JOIN services ON types_of_services.id = services.type_of_service_id
        WHERE services.id = ?");

        $query->execute([$serv_id]);

        return $query->fetchAll();
    }

    public static function getTimeBySpec($spec, $date)
    {
        $query = Connection::make()->prepare("SELECT time_start_work, time_end_work FROM shifts INNER JOIN shedules ON shifts.id = shedules.shift_id WHERE shedules.specialist_id = ? AND shedules.date = ?");

        $query->execute([$spec, $date]);

        return $query->fetch();
    }

    public static function getSheduleBySpec($spec, $date)
    {
        $query = Connection::make()->prepare("SELECT shedules.id, shift_id, date, shifts.name as shift, time_start_work, time_end_work FROM shedules INNER JOIN shifts ON  shedules.shift_id = shifts.id WHERE shedules.specialist_id = ? AND shedules.date = ?");

        $query->execute([$spec, $date]);

        return $query->fetch();
    }

    public static function getDateBySpec($spec)
    {
        $query = Connection::make()->prepare("SELECT date FROM shedules  WHERE specialist_id = ?");

        $query->execute([$spec]);

        return $query->fetchAll();
    }

    public static function insert($data)
    {
        $conn = Connection::make();

        $create =  $conn->prepare("INSERT INTO `specialists` ( `name`, `surname`, `patronymic`, `login`, `image`, `password`, `birth_date`, `date_start_work`, `office`, `type_services_id`) VALUES ( :name, :surname, :patronymic, :login, :image, :password, :birth, :date_work, :office, :type)");

        $create->execute([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "patronymic" => $data["patronymic"],
            "image" => $data["image"],
            "login" => $data["login"],

            "password" => password_hash($data["password"], PASSWORD_DEFAULT),
            "birth" => $data["birth"],
            "date_work" => $data["date-work"],
            "office" => $data["office"],
            "type" => $data["type"],
        ]);

        $spec =  $conn->lastInsertId();
        echo ("<hr>");
        var_dump($spec);
        echo ("<hr>");
        $data["specialist_id"] = $spec;
        self::insertEducation($data);
    }

    public static function insertEducation($data)
    {
        $conn = Connection::make();
        $create = $conn->prepare("INSERT INTO `educations` (`name`, `univer`, `qualification`, `year_of_issue`, `year_of_graduation`, `specialist_id`) VALUES (:diplom, :univer, :qualification, :year_of_issue, :year_of_graduation, :specialist_id);");

        $create->execute([
            "diplom" => $data["diplom"],
            "univer" => $data["univer"],
            "qualification" => $data["qualification"],
            "year_of_issue" => $data["year_of_issue"],
            "year_of_graduation" => $data["year_of_graduation"],
            "specialist_id" => $data["specialist_id"],

        ]);

        return $conn->lastInsertId();
    }


    public static function deleteSpec($id)
    {
        $query = Connection::make()->prepare("DELETE FROM specialists WHERE id = ?");
        $query->execute([$id]);
    }

    public static function deleteEducation($spec_id)
    {
        $query = Connection::make()->prepare("DELETE FROM educations WHERE `educations`.`specialist_id` = ?");
        $query->execute([$spec_id]);
        // self::deleteSpec($spec_id);
    }

    public static function redacte($data, $id)
    {
        $conn = Connection::make();

        $create =  $conn->prepare("UPDATE `specialists` SET `name` = :name, `surname` = :surname, `patronymic` = :patronymic, `login` = :login, `image` = :image, `password` = :password, `birth_date` = :birth, `date_start_work` = :date_work, `office` = :office, `type_services_id` = :type WHERE id = :id");

        $create->execute([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "patronymic" => $data["patronymic"],
            "image" => $data["image"],
            "login" => $data["login"],

            "password" => password_hash($data["password"], PASSWORD_DEFAULT),
            "birth" => $data["birth"],
            "date_work" => $data["date-work"],
            "office" => $data["office"],
            "type" => $data["type"],
            "id" => $id
        ]);

        // $spec =  $conn->lastInsertId();
        return self::redacteEducation($data, $id);
    }

    public static function redacteEducation($data, $id)
    {
        $conn = Connection::make();
        $create = $conn->prepare("UPDATE `educations` SET `name` = :diplom, `univer` = :univer, `qualification` = :qualification, `year_of_issue` = :year_of_issue, `year_of_graduation` = :year_of_graduation WHERE specialist_id = :spec_id");

        $create->execute([
            "diplom" => $data["diplom"],
            "univer" => $data["univer"],
            "qualification" => $data["qualification"],
            "year_of_issue" => $data["year_of_issue"],
            "year_of_graduation" => $data["year_of_graduation"],
            "spec_id" => $id,

        ]);

        return $conn->lastInsertId();
    }

    public static function delTypeBySpec($type){
        $query = Connection::make()->prepare("UPDATE specialists SET type_services_id = NULL WHERE type_services_id = ?");
        $query->execute([$type]);
    }

    public static function getFreeSpecs(){
        $query = Connection::make()->query("SELECT specialists.id, CONCAT(specialists.surname, ' ', specialists.name, ' ', specialists.patronymic) as fio, specialists.image, specialists.login, specialists.birth_date, DATEDIFF( CURRENT_DATE(), specialists.date_start_work) DIV 365 as stag, DATEDIFF( CURRENT_DATE(), specialists.birth_date) DIV 365 as age,  specialists.date_start_work, office FROM specialists WHERE type_services_id IS NULL");
        return $query->fetchAll();
    }

    public static function getSheduleatDate($date){
        $query = Connection::make()->prepare("SELECT shedules.id, shift_id, date, shifts.name as shift, time_start_work, time_end_work, CONCAT(specialists.surname, ' ', specialists.name, ' ', specialists.patronymic) as fio  FROM shedules INNER JOIN shifts ON  shedules.shift_id = shifts.id INNER JOIN specialists ON shedules.specialist_id = specialists.id WHERE shedules.date = ?");

        $query->execute([$date]);

        return $query->fetchAll();
    }
}
