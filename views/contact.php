<?php
// Base URL dynamique
$baseURL = "http://" . $_SERVER['HTTP_HOST'] . "/www/app_transport";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $baseURL; ?>/assets/css/contact.css">
    <title>Service Client</title>
</head>
<body>
    <div class="container">
        <h1>Contactez le Service Client</h1>

        <div class="contact-info">
            <p>Email : <a href="mailto:support@votresite.com">support@votresite.com</a></p>
            <p>Téléphone : <a href="tel:+33123456789">+33 1 23 45 67 89</a></p>
            <div class="social-icons">
                <a href="#" title="Facebook">F</a>
                <a href="#" title="Twitter">T</a>
                <a href="#" title="Instagram">I</a>
            </div>
        </div>

        <form action="/submit-contact" method="POST">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" placeholder="Votre nom" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Votre email" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="5" placeholder="Votre message" required></textarea>

            <button type="submit">Envoyer</button>
        </form>
    </div>
</body>
</html>
