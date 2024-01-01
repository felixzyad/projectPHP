<?php
//include connection file
include('connection.php');
   
//create an instance of class Connection
$connection = new Connection();

//call the selectDatabase method
$connection->selectDatabase('crudPoo6');
$libelleValue = "";
$prixValue = "";
$discountValue = ""; // Initialize the variable

$errorMesage = "";
$successMesage = "";
if(isset($_POST["submit"])){

    $libelleValue = $_POST["libelle"];
    $prixValue = $_POST["prix"];
    $discountValue = $_POST["discount"]; // Now it's safe to use $discountValue
    $dateCreationValue = $_POST["dateCreation"];
    $idCategorieValue = $_POST["categories"];

    if(empty($libelleValue) || empty($prixValue) || empty($discountValue) || empty($dateCreationValue)){

            $errorMesage = "all fields must be filled out!";

    } else {
        //include the service file
        include('service.php');

        //create a new instance of the service class with the values of the inputs
        $service = new Service($libelleValue, $prixValue, $discountValue, $dateCreationValue, $idCategorieValue);

        //call the insertService method
        $service->insertService('Services', $connection->conn);

        //give the $successMesage the value of the static $successMsg of the class
        $successMesage = Service::$successMsg;

        //give the $errorMesage the value of the static $errorMsg of the class
        $errorMesage = Service::$errorMsg;

        $libelleValue = "";
        $prixValue = "";
        $discountValue = "";
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
        background-image: url('createS.jpg');
        background-size: cover;
        background-position: center;
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        backdrop-filter: blur(5px); /* Adjust the blur level as needed */
        background: rgba(255, 255, 255, 0.5); /* Adjust the opacity as needed */
        border-radius: 10px;
    }
   </style>
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-header">
                <h2 class="text-center">Service Form</h2>
            </div>
            <div class="card-body">

                <?php
                if(!empty($errorMesage)){
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMesage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
                ?>

                <form method="post">
                    <div class="mb-3">
                        <label class="form-label" for="fname">Libelle:</label>
                        <input value="<?php echo $libelleValue ?>" class="form-control" type="text" id="fname" name="libelle">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="lname">Prix:</label>
                        <input  value="<?php echo $prixValue ?>" class="form-control" type="text" id="lname" name="prix">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Discount:</label>
                        <input value="<?php echo $discountValue ?>" class="form-control" type="" id="" name="discount">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Date de Creation:</label>
                        <input value="<?php echo $dateCreationValue ?>" class="form-control" type="date" id="email" name="dateCreation">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="categories">Categories:</label>
                        <select name='categories' class="form-select">
                            <option selected>Select your category</option>
                            <?php
                                include('categorie.php');
                                $categories = Categorie::selectAllcategories('Categories', $connection->conn);

                                foreach($categories as $categorie){
                                    echo "<option value='$categorie[id]'>$categorie[libelle]</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <?php
                    if(!empty($successMesage)){
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMesage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
                    ?>  
                    <div class="mb-3 text-center">
                        <button name="submit" type="submit" class="btn btn-primary">Add Services</button>
                        <a href="btn.php" class="btn btn-secondary mx-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
