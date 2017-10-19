<?php
/**
 * Created by PhpStorm.
 * User: josen
 * Date: 19-Oct-17
 * Time: 7:29 PM
 */

class DatabaseSchema
{

    private $link;

    public function __construct($host, $username, $password, $database){

        $this->link = new mysqli($host, $username, $password, $database);

        // Check connection (which also checks selection of database)
        if ($this->link->connect_error) {
            die("Connection failed: " . $this->link->connect_error);
        }
    }

    // You will need to research and update this to work with mysqli (right now it's ripe for SQL injection)!
    public function query($query) {
        $result = mysqli_query($this->link, $query);
        if (!$result) die('Invalid query: ' . mysqli_error($this->link));
        return $result;
    }

    // This method will create a table based on the SQL you send it
    public function create_table($sql) {
        if ($this->link->query($sql) === TRUE) {
            return "Table created successfully";
        } else {
            return "Error creating table: " . $this->link->error;
        }
    }

    // Close connection
    public function __destruct() {
        $this->link->close();
    }
}