<?php

require_once __DIR__ . '/../bd/connection.php'; 

class Contact
{
    public $name;
    public $email;
    public $message;

    // Constructeur pour initialiser les propriétés
    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    // Méthode pour valider les données
    public function validate()
    {
        // Vérification si les champs sont vides
        if (empty($this->name) || empty($this->email) || empty($this->message)) {
            return false;
        }

        // Validation de l'email
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    // Méthode pour enregistrer le contact dans la base de données
    public function saveToDatabase()
    {
        try {
            // Connexion à la base de données
            $db = Database::getConnection();

            // Requête pour insérer le message de contact
            $query = $db->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");

            // Exécution de la requête
            $query->execute([
                ':name' => $this->name,
                ':email' => $this->email,
                ':message' => $this->message
            ]);

            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            throw new Exception("Erreur lors de l'enregistrement du contact : " . $e->getMessage());
        }
    }

    // Méthode pour envoyer l'email
    public function sendEmail()
    {
        // Paramètres de l'email
        $to = "support@votresite.com"; // Destinataire
        $subject = "Message de contact";
        $body = "Nom: {$this->name}\nEmail: {$this->email}\n\nMessage:\n{$this->message}";
        $headers = "From: {$this->email}\r\n";
        $headers .= "Reply-To: {$this->email}\r\n"; // Ajouter l'adresse email comme adresse de réponse

        // Envoi de l'email
        if (mail($to, $subject, $body, $headers)) {
            return true;
        } else {
            return false;
        }
    }
}

?>
