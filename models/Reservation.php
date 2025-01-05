<?php
require_once __DIR__ . '/../bd/connection.php'; 

class Reservation {
    // Méthode pour créer une réservation dans la base de données
    public static function create($vehicle_id, $customer_name, $date, $address, $destination, $phone) {
        try {
            // Obtenir l'instance de la connexion PDO
            $db = Database::getConnection();

            // Préparer la requête d'insertion
            $query = "
                INSERT INTO reservations (vehicle_id, customer_name, date, address, destination, phone)
                VALUES (:vehicle_id, :customer_name, :date, :address, :destination, :phone)
            ";
            $stmt = $db->prepare($query);

            // Associer les paramètres
            $stmt->bindParam(':vehicle_id', $vehicle_id, PDO::PARAM_INT);
            $stmt->bindParam(':customer_name', $customer_name, PDO::PARAM_STR);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);
            $stmt->bindParam(':destination', $destination, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);

            // Exécuter la requête
            return $stmt->execute();
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            throw new Exception("Erreur lors de la création de la réservation : " . $e->getMessage());
        }
    }
}
