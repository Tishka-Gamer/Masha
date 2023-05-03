<?php

namespace App\models;

use App\helpers\Connection;


class Specie
{
    public static function getAll()
    {
        $query = Connection::make()->query("SELECT * FROM species");
        return $query->fetchAll();

        
    }
}
