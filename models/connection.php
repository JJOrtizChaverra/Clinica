<?php

class DataBase {

    static public function connection() {

        $dataBase = new PDO("mysql:host=localhost;dbname=clinica;", "root", "");

        $dataBase -> exec("set names UTF8");

        return $dataBase;
    }
}