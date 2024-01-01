<?php

class Client {
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $reg_date; 
    public $idCity;
    public $idType;
    public static $errorMsg = "";
    public static $successMsg = "";

    public function __construct($firstname, $lastname, $email, $password, $idCity, $idType) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->idCity = $idCity;
        $this->idType = $idType;
    }

    public function insertClient($tableName, $conn) {
        $sql = "INSERT INTO $tableName (firstname, lastname, email, password, idCity, idType)
                VALUES ('$this->firstname', '$this->lastname', '$this->email', '$this->password', '$this->idCity', '$this->idType')";
        if (mysqli_query($conn, $sql)) {
            self::$successMsg = "New record created successfully";
        } else {
            self::$errorMsg = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    public static function selectAllClients($tableName, $conn) {
        $sql = "SELECT id, firstname, lastname, email, idCity FROM $tableName";
        $result = mysqli_query($conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    static function selectClientById($tableName, $conn, $id) {
        // Select the 'email' column along with other columns
        $sql = "SELECT id, firstname, lastname, email, idCity, idSexe FROM $tableName  WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = [];
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        }
        return $row;
    }
    

    public static function updateClient($client, $tableName, $conn, $id) {
        $sql = "UPDATE $tableName SET lastname='$client->lastname', firstname='$client->firstname', email='$client->email' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            self::$successMsg = "Record updated successfully";
            header("Location:read.php");
        } else {
            self::$errorMsg = "Error updating record: " . mysqli_error($conn);
        }
    }

    public static function deleteClient($tableName, $conn, $id) {
        $sql = "DELETE FROM $tableName WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            self::$successMsg = "Record deleted successfully";
            header("Location:read.php");
        } else {
            self::$errorMsg = "Error deleting record: " . mysqli_error($conn);
        }
    }

    public static function selectClientByCityId($tableName, $conn, $idCity) {
        $sql = "SELECT id, firstname, lastname, email, idCity FROM $tableName  WHERE idCity='$idCity'";
        $result = mysqli_query($conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
}

?>
