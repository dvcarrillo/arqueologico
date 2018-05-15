<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 13/5/18
 * Time: 20:53
 */

class UserAreaController
{
    private $loginItem = "";

    public function __construct() {
        require_once('models/user.php');
    }

    public function setView($item) {
        $this->loginItem = $item;
    }

    public function show() {
        switch ($this->loginItem) {
            case 'login':
                require_once('views/user_area/loginForm.php');
                break;
            case 'registration':
                require_once('views/user_area/registrationForm.php');
                break;
            case 'userarea':
                require_once('views/user_area/userArea.php');
                break;
            default:
                require_once('views/pages/error.php');
                break;
        }
    }

}