<?php 

require "../vendor/autoload.php";

$router = new \Bramus\Router\Router();

/**
 *  ! GET
 */
// trae todos los datos de la db
$router -> get("/camper",function(){
    /**
     * * new \App\connect() => se crea una instancia de la clase que se encarga de establecer la conexion a la base de datos
     */
    $cox = new \App\connect();
    /**
     * * preparando una consulta SQL para seleccionar todos los registros de la tabla "tb_camper"
     */
    $res = $cox->con->prepare("SELECT * FROM tb_camper");
    /**
     * *ejecutando la consulta SQL que preparaste en la línea anterior
     */
    $res -> execute();
    /**
     * *La función fetchAll() devuelve un array que contiene todas las filas resultantes de la consulta. Estás utilizando \PDO::FETCH_ASSOC para obtener un array asociativo que utiliza los nombres de las columnas como claves.
     */
    $res = $res -> fetchAll(\PDO::FETCH_ASSOC);
    /**
     * *convirtiendo el array de resultados en formato JSON utilizando la función json_encode() y lo estás mostrando como respuesta de la solicitud
     */
    echo json_encode($res);
});
// MISMO CODIGO DE ARRIBA PERO SIN COMENTARIOS:

// $router -> get("/camper",function(){
//     $cox = new \App\connect();
//     $res = $cox->con->prepare("SELECT * FROM tb_camper");
//     $res -> execute();
//     $res = $res -> fetchAll(\PDO::FETCH_ASSOC);
//     echo json_encode($res);
// });


// TRAE LOS DATOS PERO ESPECIFICO DESDE DONDE CON EL WHERE:

// $router -> get("/camper",function(){
//     $cox = new \App\connect();
//     $res = $cox->con->prepare("SELECT * FROM tb_camper WHERE id > 60");
//     $res -> execute();
//     $res = $res -> fetchAll(\PDO::FETCH_ASSOC);
//     echo json_encode($res);
// });


// trae los datos especificados por id:
// $router->get("/camper/{id}", function($id) {
//     $cox = new \App\connect();
//     $res = $cox->con->prepare("SELECT * FROM tb_camper WHERE id = :ID");
//     $res->bindValue('ID', $id);
//     $res->execute();
//     $result = $res->fetchAll(\PDO::FETCH_ASSOC);
//     echo json_encode($result);
// });


//buscar registros que coincidan con una parte del nombre ingresada en la URL:
// $router->get("/camper/{nombre}", function($nombre) {
//     $nombreLike = $nombre . '%'; // Agregar el carácter comodín '%' al final del nombre
//     $cox = new \App\connect();
//     $res = $cox->con->prepare("SELECT * FROM tb_camper WHERE nombre LIKE :NOMBRE");
//     $res->bindValue('NOMBRE', $nombreLike);
//     $res->execute();
//     $result = $res->fetchAll(\PDO::FETCH_ASSOC);
//     echo json_encode($result);
// });

/**
 *  ! PUT
 */

// $router->put("/camper", function(){
//     $_DATA = json_decode(file_get_contents("php://input"),true);
//     $cox = new \App\connect();
//     $res = $cox->con->prepare("UPDATE tb_camper SET nombre = :NOMBRE, edad =:EDAD WHERE id=:CEDULA");
//     $res -> bindValue('NOMBRE', $_DATA["nom"]);
//     $res -> bindValue('CEDULA', $_DATA["id"]);
//     $res -> bindValue('EDAD', $_DATA["edad"]);
//     $res -> execute();
//     $res = $res->rowCount();
//     echo json_encode($res);
// });


// trae los datos por medio del id del metodo get
$router->put("/camper/{id}", function($id) {
    $_DATA = json_decode(file_get_contents("php://input"),true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("UPDATE tb_camper SET nombre = :NOMBRE, edad = :EDAD WHERE id = :ID");
    $res -> bindValue('NOMBRE', $_DATA["nom"]);
    $res -> bindValue('EDAD', $_DATA["edad"]);
    $res -> bindValue('ID', $id);
    $res -> execute();
    $res = $res->rowCount(); //obtener el número de filas afectadas por la última operación de la consulta
    echo json_encode($res);
});

/**
 *  ! DELETE
 */
$router->delete("/camper/{id}", function($id){
    $_DATA = json_decode(file_get_contents("php://input"),true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("DELETE FROM tb_camper WHERE id=:ID");
    $res -> bindValue('ID', $id);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

/**
 *  ! POST
 */
$router->post("/camper",function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("INSERT INTO tb_camper (nombre, edad) VALUES (:NOMBRE, :EDAD)");
    $res->bindValue('NOMBRE', $_DATA["nom"]);
    $res->bindValue('EDAD', $_DATA["edad"]);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});



$router->run();