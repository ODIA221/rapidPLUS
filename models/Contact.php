<?php

class Contact
{
    private $name;
    private $email;
    private $message;
    private $db;

    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;

        // Connexion à la base de données (ajustez selon votre configuration)
        $this->db = new PDO('mysql:host=localhost;dbname=rapide-plus', 'root', '');  // Mot de passe vide ici
    }

    // Exemple de méthode create qui accepte un objet Contact
    public function create($contact)
    {
        $query = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$contact->name, $contact->email, $contact->message]);
    }


}
?>
