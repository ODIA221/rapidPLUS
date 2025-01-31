<?php
// Base URL dynamique
$baseURL = "http://" . $_SERVER['HTTP_HOST'] . "/www/app_transport";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapide Plus Transport</title>
    <!-- Lien vers le CSS -->
    <link rel="stylesheet" href="<?php echo $baseURL; ?>/assets/css/index.css">
</head>
<body>
    <!-- Inclusion du Header -->
    <?php require_once __DIR__ . '/views/header.php'; ?>

    <!-- Contenu principal -->
    <main class="container">
    <section class="banner">
            <img src="<?php echo $baseURL; ?>/assets/img/background.PNG" alt="background">
        </section>
        <section class="content">
            <h2>Efficace - Fiable - Rentable</h2>
            <div class="transport-images">
                <img src="<?php echo $baseURL; ?>/assets/img/bus.jpg" alt="Bus">
                <img src="<?php echo $baseURL; ?>/assets/img/taxi.jpg" alt="Taxi">
                <img src="<?php echo $baseURL; ?>/assets/img/moto.jpg" alt="Moto">
            </div>
        </section>
    </main>

    <!-- Inclusion du Footer -->
    <?php require_once __DIR__ . '/views/footer.php'; ?>
</body>
</html>
