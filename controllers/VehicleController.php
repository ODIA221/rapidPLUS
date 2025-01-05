<?php
// Base URL dynamique
$baseURL = "http://" . $_SERVER['HTTP_HOST'] . "/www/app_transport";

// Inclure le modèle Vehicle
require_once __DIR__ . '/../models/Vehicle.php'; 

class VehicleController {
    /**
     * Récupère les véhicules disponibles .
     *
     * @return array 
     */
    public static function showAvailableVehicles() {
        // Récupérer les véhicules disponibles via le modèle
        return Vehicle::getAvailableVehicles();
    }
}
?>
