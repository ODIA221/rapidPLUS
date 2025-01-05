<?php
require_once __DIR__ . '/../models/Vehicle.php';

class VehicleController {

    // Méthode pour gérer la soumission du formulaire
    public function handleSubmit() {
        $result = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération et protection des données utilisateur
            $licensePlate = htmlspecialchars($_POST['licensePlate'] ?? '', ENT_QUOTES, 'UTF-8');
            $driverName = htmlspecialchars($_POST['driverName'] ?? '', ENT_QUOTES, 'UTF-8');
            $driverPhone = htmlspecialchars($_POST['driverPhone'] ?? '', ENT_QUOTES, 'UTF-8');
            $isAvailable = $_POST['isAvailable'] ?? 0; // Valeur par défaut : 0 (Non disponible)
            $contactInfo = htmlspecialchars($_POST['contactInfo'] ?? '', ENT_QUOTES, 'UTF-8');

            // Validation des données
            if ($this->validateForm($licensePlate, $driverName, $driverPhone, $isAvailable, $contactInfo)) {
                // Appel de la méthode create pour ajouter le véhicule
                try {
                    if (Vehicle::create($licensePlate, $driverName, $driverPhone, $isAvailable, $contactInfo)) {
                        $result = "<p class='success'>Véhicule ajouté avec succès !</p>";
                    } else {
                        $result = "<p class='error'>Erreur lors de l'ajout du véhicule. Veuillez réessayer.</p>";
                    }
                } catch (Exception $e) {
                    $result = "<p class='error'>Erreur interne : " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</p>";
                }
            } else {
                $result = "<p class='error'>Veuillez remplir correctement tous les champs.</p>";
            }
        }

        return $result;
    }

    // Validation du formulaire
    private function validateForm($licensePlate, $driverName, $driverPhone, $isAvailable, $contactInfo) {
        if (empty($licensePlate) || empty($driverName) || empty($driverPhone) || empty($contactInfo)) {
            return false;
        }

        // Valider le format du numéro de téléphone (optionnel)
        if (!preg_match('/^\+?[0-9]{10,15}$/', $driverPhone)) {
            return false;
        }

        return true;
    }
}
?>
