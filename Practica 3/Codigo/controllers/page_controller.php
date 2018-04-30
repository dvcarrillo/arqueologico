<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 26/4/18
 * Time: 19:22
 */

class PageController
{
    public function home() {
        require_once('views/articles/index.php');
    }

    public function article() {
        require_once('views/articles/show.php');
    }

    public function error() {
        require_once('views/pages/error.php');
    }
}
?>