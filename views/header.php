<?php
// Base URL dynamique
$baseURL = "http://" . $_SERVER['HTTP_HOST'] . "/www/app_transport";
?>
<header>
    <div class="logo">
        <!-- Chemin dynamique pour le logo -->
        <img src="<?php echo $baseURL; ?>/assets/img/logo.jpg" alt="Rapide Plus Logo">
    </div>
    <nav class="navigation">
        <a href="<?php echo $baseURL; ?>/index.php">ACCUEIL</a>
        <a href="<?php echo $baseURL; ?>/views/contact.php">SERVICE CLIENT</a>
        <a href="<?php echo $baseURL; ?>/views/vehicule_list.php">Liste Véhicule</a>
        <a href="<?php echo $baseURL; ?>/views/reservation.php">RÉSERVATION</a>
    </nav>
</header>
