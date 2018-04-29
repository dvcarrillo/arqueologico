<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 18/4/18
 * Time: 20:54
 */

/**
 * Class ConexionDB
 * Connects to the database
 */

class ConexionDB
{
    private static $instance = NULL;

    private $servername = "localhost";
    private $dbname = "arqueologico";
    private $username = "root";
    private $password = "";

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=localhost;dbname=arqueologico', 'root', '', $pdo_options);
        }
        return self::$instance;
    }
}