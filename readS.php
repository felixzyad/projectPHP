<?php
include('categorie.php');
include('connection.php');

$connection = new Connection();
$connection->selectDatabase('crudPoo6');
include('service.php');

$services = Service::selectAllServices('Services', $connection->conn);

if (isset($_POST['submit'])) {
    $services = Service::selectServiceByCategorieId('Services', $connection->conn, $_POST['categories']);
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
            background-image: url('readS.jpg'); 
        }

     </style>
</head>
<body>

<div class="container my-5">
    <center> <h2>List of services from database</h2></center>
    <center>
    <a class="btn btn-primary" href="createS.php" role="button">Add Services</a>
    <a class="btn btn-primary" href="btn.php" role="button">Back</a>
    </center>
    <br>
    <br>
    <form method="post">
        <div class="input-group">
            <span class="input-group-btn">
                <button class="btn btn-success" type="submit" name="submit">Search</button>
            </span>
            <select name='categories' class="form-select">
                <option selected>Select a category</option>
                <?php
                $categories = Categorie::selectAllcategories('Categories', $connection->conn);
                foreach ($categories as $categorie) {
                    echo "<option value='$categorie[id]' >$categorie[libelle]</option>";
                }
                ?>
            </select>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Libelle</th>
            <th>prix</th>
            <th>discount</th>
            <th>date de creation</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($services as $row) {
            $categorie = Categorie::selectCategorieById('Categories', $connection->conn, $row['id_categorie']);
            $dateCreation = isset($row['date_creation']) ? $row['date_creation'] : 'N/A';
            echo "<tr>
                    <td>$row[id]</td>
                    <td>$row[libelle]</td>
                    <td>$row[prix]</td>
                    <td>$row[discount]</td>
                    <td>$dateCreation</td>
                    <td>$categorie[libelle]</td>
                    <td>
                        <a class ='btn btn-success btn-sm' href='updateS.php?id=$row[id]'>edit</a>
                        <a class ='btn btn-danger btn-sm' href='deleteS.php?id=$row[id]'>delete</a>
                    </td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
