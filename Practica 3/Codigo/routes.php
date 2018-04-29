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
    require_once('controllers/' . $option . '_controller.php');

    // create a new instance of the needed controller
    switch($option) {
        case 'article':
            $option = new ArticleController();
            break;
        case 'home':
            $option = new HomeController();
            break;
    }

    // call the action
    $option->{ $item }();
}

// check that the requested controller and action are both allowed
// if someone tries to access something else he will be redirected to the error action of the pages controller
if (is_numeric($item)) {
    call($option, $item);
} else {
    call('pages', 'error');
}

?>