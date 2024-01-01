<?php

class Categorie{

    public $id;
    public $libelle;
    public static $errorMsg = "";

    public static $successMsg="";

    public function __construct($firstname3){

        //initialize the attributs of the class with the parameters, and hash the password
        $this->libelle = $firstname3;
    }
    
    public function insertCategories($tableName,$conn){
    
    //insert a client in the database, and give a message to $successMsg and $errorMsg
    $sql = "INSERT INTO $tableName (libelle)
    VALUES ('$this->libelle')";
    if (mysqli_query($conn, $sql)) {
    self::$successMsg= "New record created successfully";
    
    } else {
        self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    
    
    }

    public static function selectAllcategories($tableName,$conn){
        $sql = "SELECT id, libelle  FROM $tableName ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $data=[];
        while($row = mysqli_fetch_assoc($result)) {
        
            $data[]=$row;
        }
        return $data;
    }
    }

    public static function selectCategorieById($tableName, $conn, $id){
        $sql = "SELECT libelle FROM $tableName  WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
    
        if ($result === false) {
            die('Error in the SQL query: ' . mysqli_error($conn));
        }
    
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $row = mysqli_fetch_assoc($result);
        } else {
            $row = null; // Ou un autre traitement pour indiquer qu'aucune catégorie n'a été trouvée.
        }
    
        return $row;
    }
    
}



?>