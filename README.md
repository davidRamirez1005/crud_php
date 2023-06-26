**COMANDOS COMPOSER**

composer init 

composer require bramus/router ~1.6


composer require vlucas/phpdotenv

composer update

/////////////////////////////////////////////////////////////////

mejor manera de ver debugging -> dd(); => composer require symfony/var-dumper

/////////////////////////////////////////////////////////////////

**CONSULTAS SQL**

*SELECT*: Se utiliza para recuperar datos de una o varias tablas de la base de datos. Puedes especificar las columnas que deseas recuperar, los criterios de filtrado y las tablas a unir. 

*INSERT:* Se utiliza para insertar nuevos registros en una tabla. Puedes especificar los valores para las columnas que deseas insertar. 

*UPDATE:* Se utiliza para actualizar registros existentes en una tabla. Puedes modificar los valores de una o varias columnas en función de una condición.

*DELETE:* Se utiliza para eliminar registros de una tabla. Puedes especificar una condición para indicar qué registros deben eliminarse.

*WHERE* =>  para filtrar los resultados y especificar una condición que deben cumplir los registros seleccionados. Permite establecer criterios de búsqueda y restringir el conjunto de datos devuelto por la consulta

<!--Condición:--> La condición especificada en la cláusula WHERE es una expresión lógica que se evalúa para cada fila de la tabla. Solo las filas que cumplan con la condición se incluirán en los resultados. Puedes usar operadores de comparación (como '=', '>', '<', '>=', '<='), operadores lógicos (como 'AND', 'OR', 'NOT'), funciones y otros elementos para construir la condición.