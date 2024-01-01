<?php
// include connection file
include('connection.php');

// create an instance of class Connection
$connection = new Connection();

// call the selectDatabase method
$connection->selectDatabase('crudPoo6');

// Initialize variables
$sexeValue = "";
$errorMesage = "";
$successMesage = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the gender value if it's set
    $sexeValue = isset($_POST["gender"]) ? $_POST["gender"] : "";

    if (empty($sexeValue)) {
        $errorMesage = "All fields must be filled out!";
    } else {
        // include the sexe file
        include('sexe.php');

        // create a new instance of the sexe class with the values of the inputs
        $sexes = new Sexe($sexeValue);

        // call the insertSexe method
        $sexes->insertSexe('sexe', $connection->conn);

        // give the $successMesage the value of the static $successMsg of the class
        $successMesage = Sexe::$successMsg;

        // give the $errorMesage the value of the static $errorMsg of the class
        $errorMesage = Sexe::$errorMsg;

        // Reset the variable after form submission
        $sexeValue = "";
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
        /* Center the form on the page */
        body {
            background-image: url('genre.jpg');

            
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Adjust the max-width of the container */
        .container {
            max-width: 50%;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-body">

                <h2 class="text-center">Add Sexe</h2>

                <?php
                if (!empty($errorMesage)) {
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$errorMesage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                        </button>
                    </div>";
                }
                ?>

                <br>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label" for="fname">Genre du client:</label>
                        <input value="<?php echo $sexeValue ?>" class="form-control" type="text" id="fname" name="gender">
                    </div>

                    <div class="text-center">
                        <button name="submits" type="submit" class="btn btn-primary">ADD Sexe</button>
                        <a href="btn.php" class="btn btn-secondary mx-2">Back</a>
                    </div>
                    <br>
                </form>

                <?php
                if (!empty($successMesage)) {
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMesage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                       
                        </button>
                    </div>";
                }
                ?>  

            </div>
        </div>
    </div>
</body>
</html>
