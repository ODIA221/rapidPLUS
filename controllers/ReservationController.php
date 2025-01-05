<?php
require_once __DIR__ . '/../models/Reservation.php'; 

class ReservationController {
    public static function makeReservation($vehicle_id, $customer_name, $date, $address, $destination, $phone) {
        // Vérification des champs obligatoires
        if (empty($vehicle_id) || empty($customer_name) || empty($date) || empty($address) || empty($destination) || empty($phone)) {
            throw new Exception("Tous les champs obligatoires doivent être remplis.");
        }

        return Reservation::create($vehicle_id, $customer_name, $date, $address, $destination, $phone);
    }
}
?>

