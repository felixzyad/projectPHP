<?php

class Connection{

private $servername="localhost";
private $username="root";
private $password="";
public $conn;

public function __construct(){
$this->conn = mysqli_connect($this->servername, $this->username, $this->password);
// Check connection
if (!$this->conn) {
die("Connection failed: " . mysqli_connect_error());
}


}

function createDatabase($dbName){
    //creating a database with the conn in the class ($this->conn)
    $sql = "CREATE DATABASE $dbName";
if (mysqli_query($this->conn, $sql)) {
echo "Database created successfully";
} else {
echo "Error creating database: " . mysqli_error($this->conn);
}

}

function selectDatabase($dbName){
    //select database with the conn of the class, using mysqli_select..
    mysqli_select_db( $this->conn,$dbName);
}

function createTable($query){
    
    if (mysqli_query($this->conn, $query)) {
        echo "Table Clients created successfully";
        } else {
        echo "Error creating table: " . mysqli_error($this->conn);
        }
}




function createCategoryTable($query2) {
    if (mysqli_query($this->conn, $query2)) {
        echo "Category table created successfully";
    } else {
        echo "Error creating category table: " . mysqli_error($this->conn);
    }
}

function createServiceTable($query3) {
    if (mysqli_query($this->conn, $query3)) {
        echo "Service table created successfully";
    } else {
        echo "Error creating service table: " . mysqli_error($this->conn);
    }
}

function createUserTable($query4) {
    if (mysqli_query($this->conn, $query4)) {
        echo "user table created successfully";
    } else {
        echo "Error creating user table: " . mysqli_error($this->conn);
    }
}

}

$connection = new Connection();
    

?>
