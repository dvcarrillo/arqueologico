<!-- ¡
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

    // GET petition check
    if (isset($_GET['option']) && isset($_GET['item'])) {
        $option = $_GET['option'];
        $item = $_GET['item'];
    }
    else {
        $option = 'home';
        $item = 0;
    }

    require_once("views/layout.php");
?>
