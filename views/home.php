<?php
// Base URL dynamique
$baseURL = "http://" . $_SERVER['HTTP_HOST'] . "/www/app_transport";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Lien vers le CSS -->
    <link rel="stylesheet" href="<?php echo $baseURL; ?>/assets/css/index.css">
    <title>Rapide Plus</title>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="logo">
            <!-- Chemin dynamique pour le logo -->
            <img src="<?php echo $baseURL; ?>/assets/img/logo.jpg" alt="Rapide Plus Logo">
        </div>
        <nav class="navigation">
            <a href="<?php echo $baseURL; ?>/index.php">ACCUEIL</a>
            <a href="<?php echo $baseURL; ?>/views/contact.php">SERVICE CLIENT</a>
            <a href="<?php echo $baseURL; ?>/views/reservation.php">RÉSERVATION</a>
        </nav>
    </header>

    <!-- Banner Section -->
    <section class="banner">
        <h1>RAPIDE PLUS</h1>
    </section>

    <!-- Content Section -->
    <section class="content">
        <h2>Efficace - Fiable - Rentable</h2>
        <div class="transport-images">
            <img src="<?php echo $baseURL; ?>/assets/img/bus.jpg" alt="Bus">
            <img src="<?php echo $baseURL; ?>/assets/img/taxi.jpg" alt="Taxi">
            <img src="<?php echo $baseURL; ?>/assets/img/moto.jpg" alt="Moto">
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 Rapide Plus. Tous droits réservés.</p>
    </footer>
</body>
</html>
