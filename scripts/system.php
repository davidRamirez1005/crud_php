<?php 

namespace App;

trait system{
    public function __get($name){
        return $this->{$name};
    }
}

/**
 * *trait system: => Aquí se define el trait llamado "system". Un trait en PHP es una forma de reutilizar código que puede ser incluido en varias clases. Proporciona una manera de incluir métodos en una clase sin herencia.
 */
/**
 * 
 * ? este trait "system" define un método mágico "__get" que permite acceder a propiedades inaccesibles dentro de una clase que utiliza el trait. Al hacerlo, se devuelve el valor de la propiedad solicitada. Esto proporciona una forma conveniente de acceder a las propiedades de la clase sin necesidad de escribir métodos de acceso individuales para cada propiedad.
 */