<?php
//include connection file
include('connection.php');

//create an instance of class Connection
$connection = new Connection();

//call the selectDatabase method
$connection->selectDatabase('crudPoo6');
$cityValue = "";
$errorMesage = "";
$successMesage = "";

if (isset($_POST["submitc"])) {
    $cityValue = $_POST["cityjdida"];

    if (empty($cityValue)) {
        $errorMesage = "All fields must be filled out!";
    } else {
        //include the client file
        include('city.php');

        //create new instance of client class with the values of the inputs
        $cit = new City($cityValue);

        //call the insertClient method
        $cit->insertCity('cities', $connection->conn);

        //give the $successMesage the value of the static $successMsg of the class
        $successMesage = City::$successMsg;

        //give the $errorMesage the value of the static $errorMsg of the class
        $errorMesage = City::$errorMsg;

        $cityValue = "";
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
        body{
            background-image: url('addCity.jpg');
        }
     </style>


</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="container" style="max-width: 400px;">
        <div class="card">
            <div class="card-body">

                <h2 class="text-center">Add City</h2>

                <?php
                if (!empty($errorMesage)) {
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$errorMesage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
                ?>

                <br>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label" for="fname">City Name:</label>
                        <input value="<?php echo $cityValue ?>" class="form-control" type="text" id="fname" name="cityjdida">
                    </div>

                    <div class="text-center">
                        <button name="submitc" type="submit" class="btn btn-primary">ADD City</button>
                        <a href="btn.php" class="btn btn-secondary mx-2">Back</a>
                    </div><br>

                </form>

            </div>
        </div>

        <?php
        if (!empty($successMesage)) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successMesage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>

    </div>
</body>
</html>
