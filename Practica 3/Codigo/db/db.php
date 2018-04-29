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
    private $servername = "localhost";
    private $dbname = "arqueologico";
    private $username = "root";
    private $password = "";

    public function connect() {
        $connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($connection->connect_error) {
            die("Connection to database failed: " . $connection->connect_error);
        }

        return $connection;
    }
}