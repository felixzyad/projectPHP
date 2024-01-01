<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            background-image: url('login_background.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .my-container {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(5px); /* Ajouter un filtre de flou */
            background-color: rgba(255, 255, 255, 0.7); /* Ajouter une couleur d'arrière-plan semi-transparente */
        }

        .my-container-inner {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-btn input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .form-btn input:hover {
            background-color: #0056b3;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
        }

        .register-link a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        h2 {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container my-container">
        <?php
        // Include the connection file
        require_once "connection.php";

        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            
            // Use the connection object from connection.php
            $result = mysqli_query($connection->conn, "SELECT * FROM users WHERE email = '$email'");

            // Check if the query was successful
            if ($result === false) {
                die("Error in SQL query: " . mysqli_error($connection->conn));
            }

            // Check if any rows were returned
            if ($result->num_rows > 0) {
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <div class="my-container-inner">
            <form action="loginInfo.php" method="post">
                <h2>Login</h2>
                <div class="form-group">
                    <input type="email" placeholder="Enter Email:" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Enter Password:" name="password" class="form-control">
                </div>
                <div class="form-btn">
                    <input type="submit" value="Login" name="login" class="btn btn-primary">
                </div>
            </form>
            <div class="register-link">
                <p>Not registered yet? <a href="registration.php">Register Here</a></p>
            </div>
        </div>
    </div>
</body>
</html>
