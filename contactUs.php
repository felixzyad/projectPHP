<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            color: #333;
            display: flex;
        }

        nav {
            position: fixed;
            top: 0;
            width: 100%;
            height: 50px;
            background-color: #333;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            color: #fff;
        }

        nav a {
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            line-height: 50px;
            padding: 0 15px;
            transition: color 0.3s ease;
            color: inherit;
        }

        nav a:hover {
            color: #3498db;
        }

        nav a::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: #3498db;
            transition: all 0.3s ease-in-out;
        }

        nav a:hover::before {
            width: 100%;
            left: 0;
        }

        .content-wrapper {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        /* Colonne de gauche avec l'image */
        .left-column {
            flex: 1;
            background: url('https://img.freepik.com/photos-premium/deux-chaises-plage-parasol-plage_635062-571.jpg') center/cover no-repeat;
            min-height: 100vh;
        }

        /* Colonne de droite avec le contenu */
        .right-column {
            flex: 1;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .contact-container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            color: #3498db;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .contact-form {
            display: grid;
            grid-gap: 20px;
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .success-message {
            color: #2ecc71;
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }

        .contact-info {
            margin-top: 20px;
        }

        h2 {
            color: #3498db;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .staff-member {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .staff-member img {
            border-radius: 50%;
            margin-right: 15px;
            max-width: 80px;
        }

        .staff-details {
            display: flex;
            flex-direction: column;
        }

        * {
      padding: 0;
      margin: 0;
      font-family:sans-serif;
    }
    body {

    }
    ul {
      list-style: none;
      background: #333;
      text-align: center;
      position: relative; /* Ajout pour positionner l'image */
    }
    ul img {
      position: absolute;
      top: 0;
      left: 0;
      height: 50px; /* Ajustez la hauteur selon vos besoins */
    }
    ul li {
      display: inline-block;
      position: relative;
    }
    ul li a {
      display: block;
      padding: 20px 25px;
      color: #FFF;
      text-decoration: none;
      text-align: center;
      font-size: 16px;
    }
    ul li ul.dropdown li {
      display: block;
      background: #333;
      margin: 2px 0px;
    }
    ul li ul.dropdown {
      width:auto;
      background: #00FF8C;
      position: absolute;
      z-index: 999;
      display: none;
    }
    ul li a:hover {
      background: #222;
    }
    ul li:hover ul.dropdown{
      display: block;
    }
    </style>
</head>

<body>
    <nav>
        <a href="Home.php" target="_blank">HOME</a>
        <a href="intro.php" target="_blank">Back to Intro</a>
        <a href="contactUs.php" >CONTACTUS</a>
        <a href="logout.php" >LOGOUT</a>
        <!-- Barre de recherche -->
        
    </nav>

    <!-- Contenu de la page -->
    <div class="content-wrapper">
        <!-- Colonne de gauche avec l'image -->
        <div class="left-column"></div>

        <!-- Colonne de droite avec le reste du contenu -->
        <div class="right-column">
            <div class="contact-container">
                <h1>Contactez-nous</h1>
                <p>N'hésitez pas à nous contacter pour toute question ou réservation.</p>

                <div class="contact-form">
                    <label for="name">Nom :</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Message :</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    <button id="submitButton" type="button" onclick="showSuccessMessage()">Envoyer</button>
                </div>

                <div class="success-message" id="successMessage"></div>

                <div class="contact-info">
                    <h2>Coordonnées de Contact</h2>
                    <label>Téléphone :</label>
                    <p>+33 1 23 45 67 89</p>

                    <label>Email :</label>
                    <p>info@hotel-luxe.com</p>

                    <h2>Postes du Personnel</h2>

                    <div class="staff-member">
                        <img src="https://img.freepik.com/photos-gratuite/marie-balcon-tenant-verre-profitant-temps-ensoleille-balcon_8353-12235.jpg?size=626&ext=jpg" alt="John Doe">
                        <div class="staff-details">
                            <label>Directeur Général :</label>
                            <p>John Doe</p>
                        </div>
                    </div>

                    <div class="staff-member">
                        <img src="https://img.freepik.com/premium-photo/young-businessman-casual-suit-shirt-with-glasses-portrait-city-background-generative-ai_676620-332.jpg?size=626&ext=jpg&ga=GA1.1.1826414947.1699056000&semt=aishttps://img.freepik.com/premium-photo/young-businessman-casual-suit-shirt-with-glasses-portrait-city-background-generative-ai_676620-332.jpg" alt="Jane Smith">
                        <div class="staff-details">
                            <label>Responsable des Réservations :</label>
                            <p>Jane Smith</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showSuccessMessage() {
            document.getElementById('successMessage').innerHTML = 'Votre commentaire a été envoyé avec succès! &#128077;';
        }
    </script>
</body>

</html>
