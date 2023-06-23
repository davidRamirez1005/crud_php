<?php 

    require "./vendor/autoload.php";

    // new \App\cliente();
    // new \App\compra();

    $router = new \Bramus\Router\Router();

    $router -> get("/llamado",function(){
        echo "hola";
    });

    $router->post("/datos",function(){
        print_r(file_get_contents('php://input'));
    });

    $router->run();