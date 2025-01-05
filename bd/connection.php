<?php
class Database {
    private static $connection = null;

    /**
     * Renvoie une connexion PDO à la base de données.
     *
     * @return PDO
     */
    public static function getConnection() {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO('mysql:host=localhost;dbname=rapide-plus', 'root', '');
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new Exception("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
?>
