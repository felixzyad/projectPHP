<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Dropdown Menu Using HTML and CSS</title>
  <link rel="stylesheet" href="style.css"> 
  <style>
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
  <ul>
    <img src="logo.jpg" alt="Logo" /> <!-- Remplacez 'votre_image.png' par le chemin de votre image -->
    <li><a href="#">Home</a></li>
    <li><a href="#">About Us</a></li>
    <li>
      <a href="#">Operations &#x25BE;</a>
      <ul class="dropdown">
        <li><a href="addCity.php">Add City</a></li>
        <li><a href="create.php">Add Client</a></li>
        <li><a href="addSexe.php">Add Sexe</a></li>
        <li><a href="addCategorie.php">Add Categorie</a></li>
        <li><a href="createS.php">Add service</a></li>
        <li><a href="read.php">list of Customers</a></li>
        <li><a href="readS.php">list of services</a></li>
      </ul>
    </li>

    <li>
      <a href="#">Search &#x25BE;</a>
      <ul class="dropdown">
        <li><a href="readS.php">services by category</a></li>
        <li><a href="read.php">Clients by city</a></li>
      </ul>
    </li>

    <li><a href="#">Contact Us</a></li>
  </ul>


</body>
</html>
