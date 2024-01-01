<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-image: url('loginInfo.jpg');
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            z-index: 2;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .welcome-container {
            filter: blur(0px);
            backdrop-filter: blur(5px);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            max-width: 600px;
        }

        h2 {
            color: #4caf50;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #333;
        }

        .info {
            font-size: 16px;
            margin-top: 20px;
            border: 2px solid #4caf50;
            border-radius: 8px;
            padding: 10px;
            background-color: #f4f4f4;
        }

        .info strong {
            color: #4caf50;
        }

        .explorer-btn {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
        }

        .explorer-btn:hover {
            background-color: #45a049; /* Changer la couleur au survol en vert foncé */
        }

        /* Style pour le lien de login */
        .login-link {
            color: white;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
    <title>Welcome Page</title>
</head>
<body>
    <div class="welcome-container">
        <h2>Welcome!</h2>
        <p>We are delighted to have you on board and appreciate the opportunity to serve you. Our team is dedicated to providing you with exceptional service and ensuring that your experience with us exceeds your expectations.</p>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $emailValue = $_POST['email'];
            $passwordValue = $_POST['password'];
            if (empty($emailValue) || empty($passwordValue)) {
                echo '<h1>Empty values</h1> ';  
                echo '<h2> <span style="color: red;"> If you want to discover our Hotel Please Login!</span></h2>';
                echo '<button class="explorer-btn" >  <a class="login-link" href="">Login</a> </button>';
            } else {
                echo "<div class='info'>";
                echo "<strong>Your informations:</strong><br>";
                echo "<strong>Email:</strong> $emailValue <br>";
                echo "<strong>Password:</strong> $passwordValue <br>";
                echo "</div>";

                echo "<button class='explorer-btn'> <a href=\"home.php\">Explorer</a></button>";
            }}
        else {
            // Redirect to the login page if the method is not POST
            header("Location: login.php");
            exit();
        }
        ?>
    </div> 
</body>
</html>
