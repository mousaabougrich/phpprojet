<?php

class Connection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    public $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);
        if (!$this->conn) {
            die("connection failed:" . mysqli_connect_error());
        }
    }

    function createDatabase($dbName) {
        // Check if the database already exists
        $dbCheck = mysqli_query($this->conn, "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbName'");
        if (mysqli_num_rows($dbCheck) > 0) {
            echo "Database already exists";
        } else {
            $sql = "CREATE DATABASE $dbName";
            if (mysqli_query($this->conn, $sql)) {
                echo "Database created successfully";
            } else {
                echo "Error creating database: " . mysqli_error($this->conn);
            }
        }
    }

    function selectDatabase($dbName) {
        if (!mysqli_select_db($this->conn, $dbName)) {
            die("Error selecting database: " . mysqli_error($this->conn));
        }
    }

    function createTable($query) {
        if (mysqli_query($this->conn, $query)) {
            echo "Table created successfully";
        } else {
            echo "Error creating table: " . mysqli_error($this->conn);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

?>
