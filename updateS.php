<?php
$libelleValue = "";
$prixValue = "";
$discountValue = "";
$dateCreationValue = "";

$errorMesage = "";
$successMesage = "";

include('connection.php');
include('service.php');

$connection = new Connection();
$connection->selectDatabase('crudPoo6');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérez les valeurs du formulaire
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $libelleValue = isset($_POST["libelle"]) ? $_POST["libelle"] : "";
    $prixValue = isset($_POST["prix"]) ? $_POST["prix"] : "";
    $discountValue = isset($_POST["discount"]) ? $_POST["discount"] : "";
    $dateCreationValue = isset($_POST["dateCreation"]) ? $_POST["dateCreation"] : "";

    // Assurez-vous que les champs obligatoires ne sont pas vides
    if (empty($libelleValue) || empty($prixValue)) {
        $errorMesage = "Libelle and Prix are required!";
    } else {
        // Créez une nouvelle instance de service avec les valeurs du formulaire
        $service = new Service($libelleValue, $prixValue, $discountValue, $dateCreationValue, $idCategorieValue);

        // Appelez la méthode statique updateService pour mettre à jour le service
        Service::updateService($service, 'Services', $connection->conn, $id);

        // Redirigez l'utilisateur vers la page de lecture après la mise à jour
        header("Location: readS.php");
        exit();
    }
}

// Si la méthode de requête n'est pas POST, affichez le formulaire avec les valeurs du service
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Appelez la méthode statique selectServiceById et stockez le résultat dans $row
    $row = Service::selectServiceById('Services', $connection->conn, $id);

    // Vérifiez si la ligne a été trouvée
    if ($row) {
        $libelleValue = $row["libelle"];
        $prixValue = $row["prix"];
        $discountValue = $row["discount"];
        $dateCreationValue = $row["date_creation"];
    } else {
        // Gérer le cas où la ligne n'est pas trouvée
        echo "Service not found!";
    }
} else {
    // Gérer le cas où 'id' n'est pas défini dans $_GET
    echo "ID not specified!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Service</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Update Service</h2>

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
            <!-- Form fields with current values -->
            <div class="row mb-3">
                <label class="col-form-label col-sm-1" for="libelle">Libelle:</label>
                <div class="col-sm-6">
                    <input value="<?php echo $libelleValue ?>" class="form-control" type="text" id="libelle" name="libelle">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label col-sm-1" for="prix">Prix:</label>
                <div class="col-sm-6">
                    <input value="<?php echo $prixValue ?>" class="form-control" type="text" id="prix" name="prix">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label col-sm-1" for="discount">Discount:</label>
                <div class="col-sm-6">
                    <input value="<?php echo $discountValue ?>" class="form-control" type="text" id="discount" name="discount">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label col-sm-1" for="dateCreation">Date de Creation:</label>
                <div class="col-sm-6">
                    <input value="<?php echo $dateCreationValue ?>" class="form-control" type="date" id="dateCreation" name="dateCreation">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-form-label col-sm-1" for="categories">Categories:</label>
                <div class="col-sm-6">
                    <select name='categories' class="form-select">
                        <option selected>Select your category</option>
                        <?php
                        include('categorie.php');
                        $categories = Categorie::selectAllcategories('Categories', $connection->conn);

                        foreach ($categories as $categorie) {
                            echo "<option value='$categorie[id]'>$categorie[libelle]</option>";
                        }
                        ?>
                    </select>
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

            <div class="row mb-3">
                <div class="offset-sm-1 col-sm-3 d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Update</button>
                </div>
                <div class="col-sm-1 col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="readS.php">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
