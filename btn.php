<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page avec Boutons</title>
    <style>
        body {
            background-image: url('btn.jpg');
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        .welcome-container {
    display: inline-block;
    font-weight: bold; /* Ajoutez cette ligne pour rendre le texte en gras */
}

        .frame {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .paragraph-container {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
        }

        .button-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .button-primary {
            background-color: #007bff;
            color: #fff;
        }

        .button-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        .button-success {
            background-color: #28a745;
            color: #fff;
        }

        .button-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .button-info {
            background-color: #17a2b8;
            color: #fff;
        }

        .button-warning {
            background-color: #ffc107;
            color: #fff;
        }

        .button-purple {
            background-color: #6f42c1;
            color: #fff;
        }

        .button-pink {
            background-color: #e83e8c;
            color: #fff;
        }

        .button-orange {
            background-color: #ff7c00;
            color: #fff;
        }

        .button-green {
            background-color: #28a745;
            color: #fff;
        }

        h2 {
            margin-top: 0;
        }

        .scroll-to-bottom {
    text-align: center;
    margin-top: 20px; /* Ajustez la marge en fonction de vos besoins */
}
    </style>
</head>
<body>

<div class="container">
    <div class="frame">
      

        <div class="paragraph-container">
            <div class="welcome-container"> Welcome</div>
            <p class="operations-paragraph">As an employee, you have the ability to oversee and carry out a comprehensive array of operations within the realm of hotel management. These operations encompass a diverse range of tasks</p>
        </div>

        <div class="button-container">
            <a href="addCategorie.php" class="button button-primary">Add Categorie </a>
            <a href="createS.php" class="button button-secondary">Add Service </a>
            <a href="addSexe.php" class="button button-success">Add Sexe </a>
            <a href="addCity.php" class="button button-danger">Add City </a>
            <a href="create.php" class="button button-info">Add Client </a>
            <a href="read.php" class="button button-warning">List of customers </a>
            <a href="readS.php" class="button button-purple">List of services  </a>
            <a href="readS.php" class="button button-pink">Find services By category  </a>
            <!-- Nouveaux boutons -->
            <a href="read.php" class="button button-orange">Find clients By city</a>
            <a href="readS.php" class="button button-green">Edit/Delete service form</a>
        </div>
    </div>
</div>
 <br> <br> <br>
 <section class="scroll-to-bottom">

    <button class="button-goto-home" onclick="window.location.href='home.php'">Go to Home page</button>
</section>

</body>
</html>
