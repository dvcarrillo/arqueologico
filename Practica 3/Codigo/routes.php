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
    // require the file that matches the controller name
    require_once('controllers/article_controller.php');

    $correcto=true;
    $action = $option;
    // create a new instance of the needed controller
    switch($option) {
       /* case 'pages':
            $option = new ArticleController();
            break;*/
        case 'show':
            $option = new ArticleController();
            break;   
        case 'index':
            $option = new ArticleController();
            break;   
        case 'error':
            $option = new ArticleController();
            break;       
        default:
            $correcto=false;
            call('error', 'error');  
            break;    
    }

    // call the item
    //$option->{ $action }($item);
    if($correcto)
        $option->{ $action }();
    //$option->show();
    //echo($option);
}

// check that the requested controller and action are both allowed
// if someone tries to access something else he will be redirected to the error action of the pages controller
if (is_numeric($item)) {
    call($option, $item);
} else {
    call('error', 'error');
}

?>