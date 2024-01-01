<?php

$emailValue = "";
$lnameValue = "";
$fnameValue = "";

$errorMesage = "";
$successMesage = "";

include('connection.php');
include('client.php'); // Inclure le fichier client

// Créer une instance de la classe Connection
$connection = new Connection();

// Appeler la méthode selectDatabase
$connection->selectDatabase('crudPoo6');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les valeurs du formulaire
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $emailValue = isset($_POST["email"]) ? $_POST["email"] : "";
    $lnameValue = isset($_POST["lastName"]) ? $_POST["lastName"] : "";
    $fnameValue = isset($_POST["firstName"]) ? $_POST["firstName"] : "";

    // Assurez-vous que les champs obligatoires ne sont pas vides
    if (empty($emailValue) || empty($fnameValue) || empty($lnameValue)) {
        $errorMesage = "All fields must be filled out!";
    } else {
        // Créer une nouvelle instance de client ($client) avec les valeurs d'entrée
        $client = new Client($fnameValue, $lnameValue, $emailValue, '', $idCityValue, $idSexeValue);

        // Appeler la méthode statique updateClient et donner $client en paramètres
        Client::updateClient($client, 'Clients', $connection->conn, $id);

        // Rediriger l'utilisateur vers la page de lecture après la mise à jour
        header("Location: read.php");
        exit();
    }
}

// Si la méthode de requête n'est pas POST, afficher le formulaire avec les valeurs du client
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Appeler la méthode statique selectClientById et stocker le résultat dans $row
    $row = Client::selectClientById('Clients', $connection->conn, $id);

    // Vérifier si la ligne a été trouvée
    if ($row) {
        $fnameValue = $row["first_name"];
        $lnameValue = $row["last_name"];
        $emailValue = $row["email"];
    } else {
        // Gérer le cas où la ligne n'est pas trouvée
      //  echo "Client not found!";
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
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5 ">

        <h2>Update</h2>

    <?php

    if(!empty($errorMesage)){
  echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>$errorMesage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
  </div>";
    }
       ?>

        <br>
        <form method="post">
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="fname">First Name:</label>
                    <div class="col-sm-6">
                        <input value="<?php echo $fnameValue ?>" class="form-control" type="text" id="fname" name="firstName">
                    </div>
            </div>
            <div class="row mb-3">
                    <label class="col-form-label col-sm-1" for="lname">Last Name:</label>
                    <div class="col-sm-6">
                        <input  value="<?php echo $lnameValue ?>" class="form-control" type="text" id="lname" name="lastName">
                    </div>
            </div>
            <div class="row mb-3 ">
                    <label class="col-form-label col-sm-1" for="email">Email:</label>
                    <div class="col-sm-6">
                        <input value=" <?php echo $emailValue ?>" class="form-control" type="email" id="email" name="email">
                    </div>
            </div>
            

            <?php
            if(!empty($successMesage)){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>$successMesage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
</button>
</div>";
            }
  ?>  
      

            <div class="row mb-3">
                    <div class="offset-sm-1 col-sm-3 d-grid">
                        <button name="submit" type="submit" class=" btn btn-primary">Update</button>
                    </div>
                    <div class="col-sm-1 col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="read.php">Cancel</a>
                    </div>
            </div>
        </form>

    </div>

</body>
</html>
