<?php

class Template {
    public function callTemplate() {
        include "views/template.php";
    }

    static public function path() {
        return "http://localhost/Clinica/";
    }
}