<?php
require_once __DIR__ . '/../models/Vehicle.php';

class VehicleController {

    // Méthode pour gérer la soumission du formulaire
    public function handleSubmit($licensePlate, $driverName, $driverPhone, $isAvailable, $contactInfo) {
        try {
            // Insérer les données dans la base de données
            $db = Database::getConnection();
            $query = "INSERT INTO vehicles (license_plate, driver_name, driver_phone, is_available, contact_info) 
                      VALUES (:licensePlate, :driverName, :driverPhone, :isAvailable, :contactInfo)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':licensePlate', $licensePlate);
            $stmt->bindParam(':driverName', $driverName);
            $stmt->bindParam(':driverPhone', $driverPhone);
            $stmt->bindParam(':isAvailable', $isAvailable);
            $stmt->bindParam(':contactInfo', $contactInfo);

            if ($stmt->execute()) {
                return ['status' => 'success', 'message' => 'Véhicule ajouté avec succès !'];
            } else {
                return ['status' => 'error', 'message' => 'Erreur lors de l\'ajout du véhicule.'];
            }
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Erreur: ' . $e->getMessage()];
        }
    }

    // Validation du formulaire
    private function validateForm($licensePlate, $driverName, $driverPhone, $isAvailable, $contactInfo) {
        // Vérifier si les champs essentiels sont vides
        if (empty($licensePlate) || empty($driverName) || empty($driverPhone) || empty($contactInfo)) {
            return false;
        }

        // Valider le format du numéro de téléphone (optionnel)
        if (!preg_match('/^\+?[0-9]{10,15}$/', $driverPhone)) {
            return false;
        }

        // Valider la valeur de isAvailable (doit être 0 ou 1)
        if ($isAvailable !== '0' && $isAvailable !== '1') {
            return false;
        }

        return true;
    }
}
?>
