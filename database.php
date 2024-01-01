<?php
require_once("connection.php");

// create an instance of Connection class

//include the connection file
// include('connection.php');

//create an instance of Connection class
$connection = new Connection();



//call the createDatabase methods to create database "chap4Db"
$connection->createDatabase('crudPoo6');
$query0 = "
CREATE TABLE Cities (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30)UNIQUE NOT NULL
    )
";
$query1="
CREATE TABLE Sexe (
    idS INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(30)UNIQUE NOT NULL
)
";
$query = "
CREATE TABLE Clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) UNIQUE,
password VARCHAR(80),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
idCity INT(6) UNSIGNED NOT NULL,
idType INT(6) UNSIGNED NOT NULL,
FOREIGN KEY (idCity) REFERENCES Cities(id),
FOREIGN KEY (idType) REFERENCES Sexe(idS)
)
";
$query2 = "

CREATE TABLE Categories (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(200),
    Description VARCHAR(200) ,
    date_creation DATE
    )
";

$query3 = "

CREATE TABLE Services (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(200),
    prix DECIMAL,
    discount INT UNSIGNED ,
    id_categorie INT(6) UNSIGNED NOT NULL,
    date_creation DATE,
    FOREIGN KEY (id_categorie) REFERENCES Categories(id)

    )
";
$query4 = 

  "CREATE TABLE Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(80),
    passwordRepeat VARCHAR(80)


)";
//call the selectDatabase method to select the chap4Db
$connection->selectDatabase('crudPoo6');

//call the createTable method to create table with the $query
$connection->createTable($query0);
$connection->createTable($query1);
$connection->createTable($query2);
$connection->createTable($query3);
$connection->createTable($query4);

?>
