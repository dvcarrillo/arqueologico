<!--
Sistemas de Información Basados en Web
Curso 2017 - 2018
Práctica 3

Autores:
- David Vargas Carrillo (github.com/dvcarrillo)
- Arturo Cortés Sánchez (github.com/arturocs)

Archivo que procesa las peticiones GET y redirige a diferentes vistas
-->

<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 26/4/18
 * Time: 19:18
 */
/**
 * Class Routes
 * Redirects the petition to the desired view
 */

function call($option, $item) {
    // create a new instance of the needed controller
    switch($option) {
        case 'login':
            require_once('controllers/user_area_controller.php');
            $option = new UserAreaController();
            $option->setView($item);
            $action = 'show';
            break;
        case 'show':
            require_once('controllers/article_controller.php');
            $action = $option;
            $option = new ArticleController();
            $option->detectUserType();
            break;   
        case 'print':
            require_once('controllers/article_controller.php');
            $action = $option;
            $option = new ArticleController();
            $option->detectUserType();
            break;
        case 'index':
            require_once('controllers/article_controller.php');
            $action = $option;
            $option = new ArticleController();
            $option->detectUserType();
            break;   
        case 'error':
            require_once('controllers/article_controller.php');
            $action = $option;
            $option = new ArticleController();
            $option->detectUserType();
            break;
    }
    $option->{ $action }();
}

$pagelist = ['index' , 'show', 'print', 'login'];

// Check that the requested controller and action are both allowed
// If someone tries to access something else he will be redirected to the error action of the pages controller
if (in_array($option, $pagelist)) {
    if (($option == 'show')) {
        if (is_numeric($item))
            call($option, $item);
        else
            call('error', 'error');
    }
    else {
        call($option, $item);
    }
} else {
    call('error', 'error');
}

?>