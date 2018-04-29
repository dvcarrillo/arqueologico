<!-- 
Sistemas de Información Basados en Web
Curso 2017 - 2018
Práctica 3

Autores:
- David Vargas Carrillo (github.com/dvcarrillo)
- Arturo Cortés Sánchez (github.com/arturocs)

Archivo principal de la pagina que enlaza con el resto
-->

<?php
    require_once('db/db.php');
//    require_once("models/articlephp");
//    require_once("models/comment.php

    // Comprobacion de peticiones GET
    if (isset($_GET['option']) && isset($_GET['item'])) {
        $option = $_GET['option'];
        $item = $_GET['item'];
    }
    else {
        $option = 'home';
        $item = 0;
    }

    echo ("Ver: " . $option . ", item: " . $item);

    require_once("views/layout.php");
?>
