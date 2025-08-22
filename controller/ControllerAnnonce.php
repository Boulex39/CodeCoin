<?php

class ControllerAnnonce
{
    public function creerAnnonce()
    {
        // Vérifie si l'utilisateur est connecté
        if (empty($_SESSION['user'])) {
            $_SESSION['error'] = "Vous devez être connecté pour déposer une annonce.";
            header('Location: /CodeCoin/connexion');
            exit;
        }

        $modelAnnonce = new ModelAnnonce();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $titre = trim($_POST['titre']);
            $description = trim($_POST['description']);
            $prix = (float) $_POST['prix'];
            $categorie_id = (int) $_POST['categorie_id'];

            if (empty($titre) || empty($description) || $prix <= 0 || $categorie_id <= 0) {
                $_SESSION['error'] = "Tous les champs doivent être remplis";
                header('Location: /CodeCoin/annonce/nouvelle');
                exit;
            }

            $ok = $modelAnnonce->createAnnonce(
                $titre,
                $description,
                $prix,
                $categorie_id,
                $_SESSION['user']['id']
            );

            if ($ok) {
                $_SESSION['success'] = "Annonce publiée avec succès !";
                header('Location: /CodeCoin/annonce/nouvelle');
                exit;
            } else {
                $_SESSION['error'] = "Errur lors de la publication";
                header('Location: /CodeCoin/annonce/nouvelle');
            }
        }

        require __DIR__ . '/../views/annonce/form.php';
    }

    public function AnnoncePage($id)
    {
        $modelAnnonce = new ModelAnnonce();
        $annonce = $modelAnnonce->getAnnonceById((int)$id);

        if (!$annonce) {
            $_SESSION['error'] = "Annonce introuvable.";
            header('Location: /CodeCoin/');
            exit;
        }

        require __DIR__ . '/../views/annonce/annoncePage.php';
    }

}
