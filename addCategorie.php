<?php
include('connection.php');
$connection = new Connection();
$connection->selectDatabase('crudPoo6');
$categorieValue = "";

if (isset($_POST["submits"])) {
    $categorieValue = $_POST["categ"];

    if (empty($categorieValue)) {
        $errorMesage = "All fields must be filled out!";
    } else {
        include('categorie.php');
        $categories = new Categorie($categorieValue);
        $categories->insertCategories('categories', $connection->conn);
        $successMesage = Categorie::$successMsg;
        $errorMesage = Categorie::$errorMsg;
        $categorieValue = "";
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
            background-image: url('cat.jpg');
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>Add Categorie</h2>

        <?php
        if (!empty($errorMesage)) {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMesage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-form-label col-sm-3" for="libelle">Libelle:</label>
                <div class="col-sm-9">
                    <input value="<?php echo $categorieValue ?>" class="form-control" type="text" id="libelle" name="categ">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-12 text-center">
                    <button name="submits" type="submit" class="btn btn-primary">ADD category</button>
                    <!-- Bouton "Back" sans la balise <button> supplémentaire -->
                    <a href="btn.php" class="btn btn-secondary mx-2">Back</a>
                </div>
            </div>
        </form>
    </div>

    <?php
    if (!empty($successMesage)) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successMesage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
    ?>
</body>
</html>
