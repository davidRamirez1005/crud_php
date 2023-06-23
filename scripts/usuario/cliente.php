<?php
namespace App;
class cliente {
    use system;
    function __construct(){
        // echo "Hola mundo \n";
        $_DATA= $this->data();
        print_r($_DATA);
    }
}