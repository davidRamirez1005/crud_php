<?php 

namespace App;

class connect extends credentials{
    //almacenar la conexión a la base de datos
    protected $con;
    function __construct(private $dns = "mysql",private $port = 3306){
        try {
            //  se crea una nueva instancia de la clase PDO, que se utiliza para conectarse a la base de datos
            $this->con=new \PDO( $this->dns.":host=".$this->__get('host').";dbname=".$this->__get('dbname').";user=". $this->username.";password=".$this->__get('password').";port=". $this->port);
            //  Aquí se establece un atributo en la conexión PDO para habilitar el modo de excepción. Esto significa que PDO lanzará excepciones en caso de errores en las consultas SQL.
            $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            // print_r("conexion exitosa");
        // se muestra el mensaje de la excepción utilizando el método getMessage() del objeto $e. Esto imprimirá el mensaje de error en caso de que se produzca una excepción durante la conexión a la base de datos.
        } catch (\PDOException $e) {
            print_r($e->getMessage());
        }
    }
}

/**
 * ? la clase connect se utiliza para establecer una conexión PDO con una base de datos MySQL. Recibe la configuración de conexión (como el tipo de base de datos, el host, el nombre de la base de datos, etc.) a través de propiedades heredadas de la clase credentials. Si se produce un error durante la conexión, se captura la excepción y se muestra el mensaje de error correspondiente.
 */