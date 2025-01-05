<?php
require_once __DIR__ . '/../models/Contact.php';

class ContactController
{
    // soumission du formulaire de contact
    public function handleSubmit()
    {
        $result = '';

        // Vérification de requête
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';

            // Instance du modèle Contact
            $contact = new Contact($name, $email, $message);

            // Valider les données
            if ($contact->validate()) {
                // Envoi de l'email
                if ($contact->sendEmail()) {
                    $result = "<p class='success'>Votre message a été envoyé avec succès !</p>";
                } else {
                    // Retourner un message d'erreur si l'envoi échoue
                    $result = "<p class='error'>Erreur lors de l'envoi de votre message. Veuillez réessayer plus tard.</p>";
                }
            } else {
                // Retourner un message d'erreur de validation
                $result = "<p class='error'>Veuillez remplir tous les champs correctement.</p>";
            }
        }

        return $result;
    }
}
?>
