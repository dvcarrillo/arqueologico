<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 13/5/18
 * Time: 20:53
 */

class UserAreaController
{
    public $loginItem = "";
    public $user;
    public $alertMsg;

    public function __construct() {
        require_once('models/user.php');
        $this->user = "";
    }

    public function setView($item) {
        $this->loginItem = $item;
    }

    public function show() {
        $this->processActions();

        switch ($this->loginItem) {
            case 'login':
                require_once('views/user_area/loginForm.php');
                break;
            case 'registration':
                require_once('views/user_area/registrationForm.php');
                break;
            case 'userarea':
                if (isset($_SESSION['user_name'])) {
                    $this->user = User::find($_SESSION['user_email'], $_SESSION['user_password']);
                    require_once('views/user_area/userArea.php');
                }
                else {
                    $success = $this->processLogin();
                    if ($success) {
                        require_once('views/user_area/userArea.php');
                    } else {
                        $this->alertMsg = "Usuario o clave incorrectos. Por favor introduzca de nuevo sus datos.";
                        require_once('views/user_area/loginForm.php');
                    }
                }
                break;
            default:
                require_once('views/pages/error.php');
                break;
        }
    }

    private function processLogin() {
        if ((!isset($_POST['email'])) || (!isset($_POST['password']))) {
            return false;
        }

        $entered_user = User::find($_POST['email'], $_POST['password']);

        if(is_null($entered_user)) {
            return false;
        }

        // Set session variables
        $_SESSION['user_name'] = $entered_user->nombre;
        $_SESSION['user_password'] = $entered_user->clave;
        $_SESSION['user_email'] = $entered_user->email;
        $_SESSION['user_type'] = $entered_user->tipo;
        $_SESSION['user_avatar'] = $entered_user->avatar;

        // Set user object
        $this->user = $entered_user;

        return true;
    }

    private function processActions(){
        if(isset($_GET['action'])) {
            $action = $_GET['action'];

            switch ($action) {
                case 'close':
                    // remove all session variables
                    session_unset();
                    // destroy the session
                    session_destroy();
                    $this->alertMsg = "Sesion cerrada. Hasta pronto.";
                    break;
            }
        }
    }
}