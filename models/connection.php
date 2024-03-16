<?php

class Connection {

    static public function connection() {

        $database = new PDO("mysql:host=localhost;dbname=clinica;", "root", "");

        $database -> exec("set names UTF8");

        return $database;
    }
}