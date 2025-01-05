<?php
require_once __DIR__ . '/../bd/connection.php'; 

class Vehicle {
    /**
     * Récupère tous les véhicules avec leur état.
     *
     * @return array Liste des véhicules
     */
    public static function getAllVehicles() {
        try {
            // Connexion à la base de données
            $db = Database::getConnection();

            // Requête pour récupérer tous les véhicules
            $query = $db->prepare("
                SELECT 
                    id,
                    license_plate AS licensePlate,
                    driver_name AS driverName,
                    driver_phone AS driverPhone,
                    is_available AS isAvailable,
                    contact_info AS contactInfo
                FROM vehicles
            ");

            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gestion des erreurs
            throw new Exception("Erreur lors de la récupération des véhicules : " . $e->getMessage());
        }
    }
}
?>
