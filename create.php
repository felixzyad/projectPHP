<?php
//include connection file
include('connection.php');
//create an instance of class Connection
$connection = new Connection();

//call the selectDatabase method
$connection->selectDatabase('crudPoo6');
$emailValue = "";
$lnameValue = "";
$fnameValue = "";
$passwordValue = "";
$errorMesage = "";
$successMesage = "";
if(isset($_POST["submit"])){

    $emailValue = $_POST["email"];
    $lnameValue = $_POST["lastName"];
    $fnameValue = $_POST["firstName"];
    $passwordValue = $_POST["password"];
    $idCityValue=$_POST["cities"];
    $idSexeValue=$_POST["sex"];

    if(empty($emailValue) || empty($fnameValue) || empty($lnameValue) || empty($passwordValue)){
        $errorMesage = "All fields must be filled out!";
    } else if(strlen($passwordValue) < 8 ){
        $errorMesage = "Password must contain at least 8 characters";
    } else if(preg_match("/[A-Z]+/", $passwordValue)==0){
        $errorMesage = "Password must contain at least one capital letter!";
    } else {
        //include the client file
        include('client.php');

        //create a new instance of the client class with the values of the inputs
        $client = new Client($fnameValue,$lnameValue,$emailValue,$passwordValue,$idCityValue,$idSexeValue);

        //call the insertClient method
        $client->insertClient('Clients',$connection->conn);

        //give the $successMesage the value of the static $successMsg of the class
        $successMesage = Client::$successMsg;

        //give the $errorMesage the value of the static $errorMsg of the class
        $errorMesage = Client::$errorMsg;

        $emailValue = "";
        $lnameValue = "";
        $fnameValue = "";   
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-image: url('create.jpg');
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            text-align: center;
            border: 2px solid #ced4da;
            border-radius: 10px;
            overflow: hidden;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
            backdrop-filter: blur(10px);
        }

        .form-container .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        /* Ajout d'une classe pour élargir les champs de saisie */
        .form-container .wide-input {
            width: 100%;
        }

        /* Ajout des classes pour centrer les éléments */
        .form-container .row {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>

    <br>
     <br> 
    <div class="form-container my-5">
        <h2>  Customer Form   </h2>

        <?php
        if(!empty($errorMesage)){
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMesage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-form-label col-sm-1" for="fname">First Name:</label>
                <div class="col-sm-6">
                    <input value="<?php echo $fnameValue ?>" class="form-control wide-input" type="text" id="fname" name="firstName">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label col-sm-1" for="lname">Last Name:</label>
                <div class="col-sm-6">
                    <input  value="<?php echo $lnameValue ?>" class="form-control wide-input" type="text" id="lname" name="lastName">
                </div>
            </div>
            <div class="row mb-3 ">
                <label class="col-form-label col-sm-1" for="email">Email:</label>
                <div class="col-sm-6">
                    <input value=" <?php echo $emailValue ?>" class="form-control wide-input" type="email" id="email" name="email">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label col-sm-1" for="cities">Cities:</label>
                <div class="col-sm-6">
                    <select name='cities' class="form-select">
                        <option selected>Select your city</option>
                        <?php
                            include('city.php');
                            $cities=City::selectAllcities('Cities',$connection->conn);
                            foreach($cities as $city){
                                echo "<option value='$city[id]' >$city[name]</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-form-label col-sm-1" for="sex">Sex:</label>
                <div class="col-sm-6">
                    <select name='sex' class="form-select">
                        <option selected>Select your genre</option>
                        <?php
                            include('sexe.php');
                            $sex=Sexe::selectAllsexes('sexe',$connection->conn);
                            foreach($sex as $value){
                                echo "<option value='$value[idS]' >$value[type]</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3 ">
                <label class="col-form-label col-sm-1" for="password">Psd:</label>
                <div class="col-sm-6">
                    <input  class="form-control wide-input" type="password" id="password" name="password" >
                </div>
            </div>

            <?php
            if(!empty($successMesage)){
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successMesage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
            ?>  

            <div class="row mb-3">
                <div class="offset-sm-1 col-sm-3 d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Add Client</button>
                     <br>
                    <a href="btn.php" class="btn btn-secondary mx-2">Back</a>
                </div>
            </div>
        </form>

    </div>

</body>
</html>
