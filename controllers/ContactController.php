<?php
require_once __DIR__ . '/../models/Contact.php';

class ContactController
{
    // Méthode pour gérer la soumission du formulaire de contact
    public function handleSubmit()
    {
        $result = '';

        // Vérifier si la requête est une soumission de formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données utilisateur avec protection contre les failles XSS
            $name = htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8');
            $message = htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8');

            // Validation des données
            if ($this->validateForm($name, $email, $message)) {
                // Création d'une instance du modèle Contact
                $contact = new Contact($name, $email, $message);

                try {
                    // Enregistrement du contact dans la base de données
                    if ($contact->create($contact)) {
                        // Affichage d'un message de succès (sans envoi d'email)
                        $result = "<p class='success'>Votre message a été envoyé avec succès !</p>";
                    } else {
                        $result = "<p class='error'>Erreur lors de l'enregistrement de votre message. Veuillez réessayer plus tard.</p>";
                    }
                } catch (Exception $e) {
                    // Gestion des erreurs d'enregistrement
                    $result = "<p class='error'>Erreur interne : " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</p>";
                }
            } else {
                // Message d'erreur pour la validation des champs
                $result = "<p class='error'>Veuillez remplir tous les champs correctement.</p>";
            }
        }

        // Retourne le message de résultat
        return $result;
    }

    // Méthode pour valider le formulaire
    private function validateForm($name, $email, $message)
    {
        // Vérification si les champs sont vides
        if (empty($name) || empty($email) || empty($message)) {
            return false;
        }

        // Validation de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }
}
?>
