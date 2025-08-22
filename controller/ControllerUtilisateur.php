<?php

class ControllerUtilisateur
{
    public function profil()
    {
        // Vérifie si l'utilisateur est connecté malgré que le profil ne s'affiche que si nous sommes connecté, question de sécurité
        if (empty($_SESSION['user'])) {
            $_SESSION['error'] = "Vous deveez être connecté pour accéder à votre profil.";
            header('Location: /CodeCoin/connexion');
            exit;
        }

        $modelAnnonce = new ModelAnnonce();
        $annonces = $modelAnnonce->getAnnoncesByUserId($_SESSION['user']['id']);

        require __DIR__ .  '/../views/utilisateur/profil.php';
    }
}
