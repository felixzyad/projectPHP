<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome page</title>
    <style>
        body {
            overflow: hidden;
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            position: relative;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #333;
            width: 100%;
            position: absolute;
            top: 0;
            z-index: 1;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .navbar-logo img {
            height: 50px;
            width: 50px;
            margin-right: 10px;
        }

        .navbar-links {
            display: flex;
            gap: 20px;
        }

        .navbar-links a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        .get-started-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px 30px;
            font-size: 18px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            z-index: 2;
        }

        .welcome-container {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            display: none;
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 10px;
        }

        .welcome-text {
            color: black;
            font-size: 24px;
            animation: fadeInDown 2s ease-out forwards;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .banner {
            position: relative;
        }

        video {
            width: 100%;
            height: auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#" class="navbar-logo">
            <img src="logo.jpg" alt="Logo de l'hôtel">
        </a>
        <div class="navbar-links">
            <a href="login.php">Home</a>
            <a href="signup.php">Sign up</a>
            <a href="login.php">Login</a>
            <a href="contactUs.php">Contact us</a>
        </div>
    </div>

    <div class="banner">
        <video autoplay loop muted plays-inline>
            <source src="videoH.mp4" type="video/mp4">
        </video>
        <button class="get-started-button"> <a href="signup.php" style="text-decoration: none; color: white;">Get Started</a> </button>

        <div class="welcome-container">
            <div class="welcome-text">Welcome to our website! We're delighted to have you here, and we hope you enjoy exploring all that our site has to offer.</div>
        </div>
    </div>

    <script>
        // Afficher le conteneur de bienvenue après un délai (par exemple, 2 secondes)
        setTimeout(function() {
            document.querySelector('.welcome-container').style.display = 'block';
        }, 2000);
    </script>
</body>
</html>
