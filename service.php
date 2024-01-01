<?php

class Service{

public $id;
public $libelle;
public $prix;
public $discount;

public $date_creation; 
public $idCategorie;

public static $errorMsg = "";

public static $successMsg="";


public function __construct($libelle,$prix,$discount,$date_creation,$idCategorie){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->libelle = $libelle;
    $this->prix = $prix;
    $this->discount = $discount;
    $this->date_creation=$date_creation;
    $this->idCategorie=$idCategorie;
}

public function insertService($tableName, $conn)
{
    // insert a client in the database, and give a message to $successMsg and $errorMsg
    $sql = "INSERT INTO $tableName (libelle, prix, discount, date_creation, id_categorie)
    VALUES ('$this->libelle', '$this->prix', '$this->discount', '$this->date_creation', '$this->idCategorie')";

    if (mysqli_query($conn, $sql)) {
        self::$successMsg = "New record created successfully";
    } else {
        self::$errorMsg = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}



public static function selectAllServices($tableName, $conn)
{
    $sql = "SELECT id, libelle, prix, discount, date_creation, id_categorie FROM $tableName";
   
    $result = mysqli_query($conn, $sql);

    if ($result === false) {
        die('Error in the SQL query: ' . mysqli_error($conn));
    }

    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}


static function selectServiceById($tableName, $conn, $id) {
    // Select a service by id and return the row result
    $sql = "SELECT libelle, prix, discount, date_creation, id_categorie FROM $tableName WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    $row = [];  // Initialise $row to an empty array

    if ($result && mysqli_num_rows($result) > 0) {
        // Output data of each row
        $row = mysqli_fetch_assoc($result);
    }

    return $row;
}



static function updateService($service,$tableName,$conn,$id){
    //update a client of $id, with the values of $client in parameter
    //and send the user to read.php
    $sql = "UPDATE $tableName SET libelle='$service->libelle',prix='$service->prix',discount='$service->discount' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
        self::$successMsg= "New record updated successfully";
header("Location:readS.php");
        } else {
            self::$errorMsg= "Error updating record: " . mysqli_error($conn);
        }


}

static function deleteService($tableName,$conn,$id){
    //delet a client by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    self::$successMsg= "Record deleted successfully";
    header("Location:readS.php");
} else {
    self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
}

  
    }

    public static function selectServiceByCategorieId($tableName, $conn, $idCategorie)
    {
        $sql = "SELECT id, libelle, prix, discount, id_categorie FROM $tableName WHERE id_categorie='$idCategorie'";
        $result = mysqli_query($conn, $sql);
    
        if ($result === false) {
            die('Error in the SQL query: ' . mysqli_error($conn));
        }
    
        $data = [];
    
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    
        return $data;
    }
    

    }


?>
