<?php
namespace App;
trait system{
    public function data() {
        return $_DATA = (file_get_contents("php://input") == "") ? ["Message" => null] : json_decode(file_get_contents("php://input"),true);
    }
}