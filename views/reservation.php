<?php
require_once __DIR__ . '/../controllers/ReservationController.php';
require_once __DIR__ . '/../bd/connection.php';

// Récupérer la liste des IDs des véhicules depuis la base de données
function getVehicleIds() {
    try {
        $db = Database::getConnection();
        $query = "SELECT id FROM vehicles"; 
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    } catch (PDOException $e) {
        throw new Exception("Erreur lors de la récupération des véhicules : " . $e->getMessage());
    }
}

$vehicleIds = [];
try {
    $vehicleIds = getVehicleIds();
} catch (Exception $e) {
    $message = "<p class='error'>" . htmlspecialchars($e->getMessage()) . "</p>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicle_id = $_POST['vehicle_id'];
    $customer_name = $_POST['customer_name'];
    $date = $_POST['date'];
    $address = $_POST['address'];
    $destination = $_POST['destination'];
    $phone = $_POST['phone'];

    try {
        if (ReservationController::makeReservation($vehicle_id, $customer_name, $date, $address, $destination, $phone)) {
            $message = "<p class='success'>Réservation réussie !</p>";
            $redirectDelay = 3; // Délai de redirection en secondes
        } else {
            $message = "<p class='error'>Erreur lors de la réservation.</p>";
        }
    } catch (Exception $e) {
        $message = "<p class='error'>" . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/reservation.css">
    <title>Réserver un véhicule</title>
</head>

<body>
    <!-- Inclusion du Header -->
    <?php require_once __DIR__ . '/header.php'; ?>
    <main class="container">
        <h1>Réserver un véhicule</h1>
        <?php if (isset($message)) echo $message; ?>
        <form method="POST">
            <input type="hidden" id="vehicle_id" name="vehicle_id" value="<?php echo htmlspecialchars($_GET['vehicle_id'] ?? ''); ?>">

            <label for="customer_name">Nom :</label>
            <input type="text" id="customer_name" name="customer_name" required>

            <label for="date">Date et heure :</label>
            <input type="datetime-local" id="date" name="date" required>

            <label for="address">Adresse de départ :</label>
            <input type="text" id="address" name="address" required>

            <label for="destination">Destination :</label>
            <input type="text" id="destination" name="destination" required>

            <label for="phone">Téléphone :</label>
            <input type="tel" id="phone" name="phone" required>

            <button type="submit">Réserver</button>

            <?php if (isset($redirectDelay)): ?>
        <script type="text/javascript">
            setTimeout(function() {
                window.location.href = '/www/app_transport/index.php';
            }, <?php echo $redirectDelay * 1000; ?>);
        </script>
    <?php endif; ?>
        </form>
    </main>

<!-- Inclusion du Footer -->
<?php require_once __DIR__ . '/footer.php'; ?>
</body>

</html>
