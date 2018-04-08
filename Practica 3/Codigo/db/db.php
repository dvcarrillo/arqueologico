<!-- 
Sistemas de Información Basados en Web
Curso 2017 - 2018
Práctica 3

Autores:
- David Vargas Carrillo (github.com/dvcarrillo)
- Arturo Cortés Sánchez (github.com/arturocs)

Archivo que gestiona la conexion con la base de datos MySQL
-->

<?php
    class DBConnect {
        public static function connect(){
            // Se intenta conectar con el servidor
            $connection = mysql_connect('localhost', 'root', '') 
                or exit('No se pudo conectar al servidor');
            // Se abre la base de datos
            // $database = mysql_select_db('')
            // working on it...
        }
    }
?>
