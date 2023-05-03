<?php

namespace App\models;

use App\helpers\Connection;


class Recommend
{
    public static function getAll()
    {
        $query = Connection::make()->query("SELECT * FROM care_tips");
        return $query->fetchAll();

       
    }
}