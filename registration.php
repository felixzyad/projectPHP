<?php
require_once("connection.php");

session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}

// Instantiate the Connection class
$connection = new Connection();
$connection->selectDatabase('crudPoo6');
$conn = $connection->conn;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            background-image: url('registration.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .registration-container {
            border: 1px solid #ddd; /* Border color */
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(5px); /* Add backdrop-filter for blur effect */
        }

        .form-group {
            margin-bottom: 15px;
        }

        .login-link {
            margin-top: 15px;
            text-align: center;
        }

        .login-link a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="registration-container">
            <?php
            if (isset($_POST["submit"])) {
                $fullName = $_POST["fullname"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $passwordRepeat = $_POST["repeat_password"];
                
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
                $errors = array();
                
                if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
                    array_push($errors, "All fields are required");
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "Email is not valid");
                }
                if (strlen($password) < 8) {
                    array_push($errors, "Password must be at least 8 characters long");
                }
                if ($password !== $passwordRepeat) {
                    array_push($errors, "Password does not match");
                }
        
                $sql = "SELECT * FROM Users WHERE email = ?";
                $stmt = mysqli_stmt_init($conn);
                if ($stmt) {
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
        
                    if ($result) {
                        $rowCount = mysqli_num_rows($result);
                        if ($rowCount > 0) {
                            array_push($errors, "Email already exists!");
                        }
                    } else {
                        die("Error in SQL query: " . mysqli_error($conn));
                    }
                } else {
                    die("Preparation failed: " . mysqli_error($conn));
                }
        
                if (count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                } else {
                    $sql = "INSERT INTO Users (fullName, email, password) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if ($stmt) {
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
                        mysqli_stmt_execute($stmt);
        
                        echo "<div class='alert alert-success'>You are registered successfully.</div>";
                    } else {
                        die("Preparation failed: " . mysqli_error($conn));
                    }
                }
            }
            ?>
            <form action="registration.php" method="post">
                <div class="form-group">
                    <label for="fullname">Full Name:</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                </div>
                <div class="form-group">
                    <label for="repeat_password">Repeat Password:</label>
                    <input type="password" class="form-control" name="repeat_password" id="repeat_password" placeholder="Repeat your password">
                </div>
                <div class="form-btn">
                    <input type="submit" class="btn btn-primary" value="Register" name="submit">
                </div>
            </form>
            <div class="login-link">
                <p>Already Registered? <a href="login.php">Login Here</a></p>
            </div>
        </div>
    </div>
</body>
</html>
