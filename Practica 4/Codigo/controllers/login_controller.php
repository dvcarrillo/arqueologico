<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 13/5/18
 * Time: 20:53
 */

class LoginController
{
    private $loginItem = 0;

    public function __construct() {
        require_once('models/user.php');
    }

    public function showLoginForm() {
        require_once('views/user_area/loginForm.php');
    }

    public function setItemLoginForm($item) {
        $this->loginItem = $item;
    }
}