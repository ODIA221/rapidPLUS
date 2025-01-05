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

    /**
     * Insère un véhicule dans la base de données.
     *
     * @param string $licensePlate Plaque d'immatriculation
     * @param string $driverName Nom du chauffeur
     * @param string $driverPhone Téléphone du chauffeur
     * @param int $isAvailable Disponibilité du véhicule
     * @param string $contactInfo Informations de contact
     * @return bool Retourne true si l'insertion a réussi, sinon false
     */
    public static function create($licensePlate, $driverName, $driverPhone, $isAvailable, $contactInfo) {
        try {
            $db = Database::getConnection();
            
            // Requête d'insertion
            $query = $db->prepare("
                INSERT INTO vehicles (license_plate, driver_name, driver_phone, is_available, contact_info)
                VALUES (?, ?, ?, ?, ?)
            ");
            
            // Exécution de la requête
            return $query->execute([$licensePlate, $driverName, $driverPhone, $isAvailable, $contactInfo]);
        } catch (PDOException $e) {
            // Gestion des erreurs
            throw new Exception("Erreur lors de l'ajout du véhicule : " . $e->getMessage());
        }
    }
}
?>
