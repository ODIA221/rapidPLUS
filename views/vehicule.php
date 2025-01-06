<?php
require_once __DIR__ . '/../controllers/VehicleController.php';  

$baseURL = "http://" . $_SERVER['HTTP_HOST'] . "/www/app_transport";

// Créez une instance du contrôleur
$vehicleController = new VehicleController();
$result = $vehicleController->handleSubmit();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/vehicule.css">
    <title>Ajouter un Véhicule</title>
</head>
<body>
    <!-- Inclusion du Header -->
    <?php require_once __DIR__ . '/header.php'; ?>
    <main class="container">
        <h1>Ajouter un Véhicule</h1>

        <!-- Affichez le message de résultat s'il y en a un -->
        <?php if (!empty($result)): ?>
            <div class="result-message <?php echo $result['status'] === 'success' ? 'success' : 'error'; ?>">
                <?php echo htmlspecialchars($result['message'], ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="licensePlate">Plaque d'immatriculation :</label>
            <input type="text" id="licensePlate" name="licensePlate" placeholder="Ex: AB-123-CD" required>

            <label for="driverName">Nom du chauffeur :</label>
            <input type="text" id="driverName" name="driverName" placeholder="Nom du chauffeur" required>

            <label for="driverPhone">Téléphone du chauffeur :</label>
            <input type="tel" id="driverPhone" name="driverPhone" placeholder="Numéro de téléphone" required>

            <label for="isAvailable">Disponible :</label>
            <select id="isAvailable" name="isAvailable" required>
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>

            <label for="contactInfo">Informations de contact :</label>
            <textarea id="contactInfo" name="contactInfo" rows="4" placeholder="Ex: Email ou autres informations" required></textarea>

            <button type="submit">Ajouter Véhicule</button>
        </form>
    </main>
    <!-- Inclusion du Footer -->
    <?php require_once __DIR__ . '/footer.php'; ?>
</body>
</html>
