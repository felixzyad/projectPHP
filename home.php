
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
.booking-column {
    flex: 1;
    max-width: 300px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-right: 20px; /* Added margin to the right of each column */
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

nav {
    position: fixed;
    top: 0;
    width: 100%;
    height: 50px;
    background-color: #2c3e50;
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

.search-bar {
    display: flex;
    align-items: center;
    margin-top: 10px;
}

.search-input {
    border: none;
    padding: 8px;
    margin-right: 10px;
    border-radius: 5px;
    font-size: 14px;
}

.search-button {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.search-button:hover {
    background-color: #2980b9;
}

.intro-section {
    background-color: #fff;
    padding: 80px 20px;
    text-align: center;
    color: #333;
}

.intro-content {
    max-width: 800px;
    margin: 0 auto;
}

.intro-content h1 {
    color: #3498db;
}

.intro-content p {
    font-size: 18px;
    line-height: 1.5;
}

.hotel-booking-form {
    display: flex;
    justify-content: space-around;
    margin-top: 0;
    margin-bottom: 0; /* Added to remove margin between columns */
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
}

.booking-column {
    flex: 1;
    max-width: 300px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-right: 20px; /* Added margin to the right of each column */
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.booking-column:hover {
    transform: scale(1.05);
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Adjusted box-shadow on hover */
}

h1 {
    color: #3498db;
    border-bottom: 2px solid #3498db;
    padding-bottom: 5px;
}

.booking-form {
    display: grid;
    grid-gap: 20px;
}

label {
    font-size: 16px;
    color: #333;
}

input,
select {
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

p {
    font-size: 14px;
    color: #666;
}

.room-image {
    width: 100%;
    max-height: 200px;
    object-fit: cover;
    border-radius: 4px;
    margin-bottom: 15px;
}

.room-description {
    font-size: 16px;
    color: #333;
    margin-bottom: 10px;
}

.room-price {
    font-size: 18px;
    color: #333;
    font-weight: bold;
}

.rating {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
}

.star::before {
    content: '\2605';
    color: #f1c40f;
    font-size: 20px;
    margin-right: 5px;
}

.hotel-entertainment {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 20px;
    background-color: #fff;
    margin: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.entertainment-item {
    flex: 1;
    max-width: 100%;
    margin: 0 10px 20px;
    padding: 20px;
    border-radius: 8px;
    background-color: #ecf0f1;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    text-align: center;
    display: inline-block;
}

.entertainment-item:hover {
    transform: scale(1.05);
}

.scroll-to-booking {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.scroll-to-booking:hover {
    background-color: #2980b9;
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


    .scroll-to-bottom {
    text-align: center;
    margin-top: 20px; /* Ajustez la marge en fonction de vos besoins */
}

    </style>
</head>

<body>

<ul>
    <img src="logo.jpg" alt="Logo" /> <!-- Remplacez 'votre_image.png' par le chemin de votre image -->
    <li><a href="home.php">Home</a></li>
    
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

    <li><a href="contactUs.php">Contact Us</a></li>
  </ul>




    <section class="intro-section">
        <div class="intro-content">
            <h1>Bienvenue à l'Hôtel de Luxe</h1>
            <p>Découvrez l'élégance ultime et le raffinement absolu dans notre hôtel de luxe. Un lieu où le confort rencontre le style, où chaque détail est soigneusement conçu pour vous offrir une expérience inoubliable.</p>
            <p>Nos chambres somptueuses, nos installations de classe mondiale et notre service exceptionnel font de votre séjour une escapade luxueuse. Que vous soyez ici pour affaires ou pour le plaisir, nous nous efforçons de rendre votre séjour aussi exceptionnel que notre établissement.</p>
          
        </div>
    </section>

    

    <section class="hotel-entertainment">
        <h2>Divertissements</h2>

        <div class="entertainment-item">
            <h3>Nos Piscines</h3>
            <img src="https://offloadmedia.feverup.com/parissecret.com/wp-content/uploads/2022/01/19044022/COUV-ARTICLES-1920x1080-44.jpg" alt="Divertissement 1" class="entertainment-image">
            <p>Découvrez notre piscine d'hôtel, une oasis de luxe où l'élégance rencontre la détente. Plongez dans des eaux scintillantes entourées de jardins luxuriants. Des espaces lounge invitants et un bar de piscine vous attendent, offrant une expérience de détente ultime. Que vous souhaitiez nager ou simplement vous prélasser, notre piscine incarne le parfait mélange de sophistication et de décontraction. Rejoignez-nous pour des moments de pure indulgence au cœur de notre oasis aquatique.</p>
        </div>

        <div class="entertainment-item">
            <h3>Nos Cafés</h3>
            <img src="https://img.freepik.com/photos-premium/loft-rendu-3d-reception-hotel-luxe-cafe-salon-restaurant_1029469-1929.jpg" alt="Divertissement 2" class="entertainment-image">
            <p>Bienvenue dans notre café, un lieu où chaque gorgée est une expérience. Installez-vous dans une atmosphère chaleureuse, entouré de l'arôme envoûtant du café fraîchement moulu. Notre menu soigneusement conçu propose des cafés exceptionnels et des délices gourmands. Que ce soit pour une pause rapide ou une réunion décontractée, chaque moment ici est une célébration du goût et de la convivialité. Bienvenue dans notre coin de bonheur caféiné</p>
        </div>

        <div class="entertainment-item">
            <h3>Nos restaurants</h3>
            <img src="https://scdn.aro.ie/Sites/50/imperialhotels2022/uploads/images/PanelImages/General/156757283_Bedford_Hotel__F_B__Botanica_Restaurant_and_Bar__General_View._4500x3000.jpg" alt="Divertissement 3" class="entertainment-image">
            <p>
                Bienvenue dans notre restaurant, une oasis gastronomique où élégance et gourmandise se rencontrent. Plongez dans une expérience culinaire raffinée, chaque plat étant une œuvre d'art délicieuse. Notre ambiance chaleureuse offre le cadre idéal pour des moments mémorables. Découvrez une carte mettant en valeur des ingrédients de qualité, magnifiés par des chefs talentueux. Bienvenue dans notre univers culinaire, où chaque repas devient une expérience inoubliable.</p>
        </div>
    </section>
    <section class="scroll-to-bottom">
    <a href="btn.php" class="scroll-to-booking">Discover more</a>
</section>

    
  >
</body>

</html>
