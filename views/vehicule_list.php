<?php
require_once __DIR__ . '/../models/Vehicle.php';

try {
    // Récupérer les véhicules
    $vehicles = Vehicle::getAllVehicles();
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/vehicule_list.css">
    <title>Liste des Véhicules</title>
</head>
<body>
    <!-- Inclusion du Header -->
    <?php require_once __DIR__ . '/header.php'; ?>
    <main class="container">
        <?php if (empty($vehicles)): ?>
            <div class="no-vehicles">
                Aucun véhicule disponible pour le moment.
            </div>
        <?php else: ?>
            <?php foreach ($vehicles as $vehicle): ?>
                <div class="vehicle-card">
                    <h2>Véhicule ID: <?= htmlspecialchars($vehicle['id']) ?></h2>
                    <p><strong>Plaque d'immatriculation :</strong> <?= htmlspecialchars($vehicle['licensePlate']) ?></p>
                    <p><strong>Nom du conducteur :</strong> <?= htmlspecialchars($vehicle['driverName']) ?></p>
                    <p><strong>Téléphone du conducteur :</strong> <?= htmlspecialchars($vehicle['driverPhone']) ?></p>
                    <p><strong>Disponibilité :</strong> 
                        <span class="<?= $vehicle['isAvailable'] ? 'available' : 'unavailable' ?>">
                            <?= $vehicle['isAvailable'] ? 'Disponible' : 'Non disponible' ?>
                        </span>
                    </p>
                    <p><strong>Localisation :</strong> <?= htmlspecialchars($vehicle['contactInfo'] ?? 'Non fourni') ?></p>
                    
                    <!-- Bouton de réservation qui envoie l'ID du véhicule -->
                    <form action="reservation.php" method="GET">
                        <input type="hidden" name="vehicle_id" value="<?= $vehicle['id'] ?>">
                        <button type="submit">Faire une réservation</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>
    <!-- Inclusion du Footer -->
    <?php require_once __DIR__ . '/footer.php'; ?>
</body>
</html>
