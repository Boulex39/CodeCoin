<?php

class ControllerAuth
{
    public function inscription()
    {
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            if (empty($_POST['pseudo']) || empty($_POST['email']) || empty($_POST['password'])) {
                $_SESSION['error'] = "Tous les champs doivent être remplis !";
                header('Location: /CodeCoin/inscription');
                exit;
            }

            $pseudo = trim($_POST['pseudo']);
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['password']);

            $modelUtilisateur = new ModelUtilisateur();

            // Vérifier si l'email existe déjà
            if ($modelUtilisateur->emailExiste($email)) {
                $_SESSION['error'] = "Cet email est déjà utilisé !";
                header('Location: /CodeCoin/inscription');
                exit;
            }

            // Création de l'utilisateur
            $successUtilisateur = $modelUtilisateur->createUtilisateur($pseudo, $email, $password);

            if ($successUtilisateur) {
                $_SESSION['success'] = "Vous êtes bien enregistré ! Vous pouvez vous connecter !";
                header('Location: /CodeCoin/connexion');
                exit;
            } else {
                $_SESSION['error'] = "Erreur lors de l'insertion.";
                header('Location: /CodeCoin/inscription');
                exit;
            }
        }

        require __DIR__ . '/../views/auth/inscription.php';
    }


    public function connexion()
    {
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            if (empty($_POST['email']) || empty($_POST['password'])) {
                $_SESSION['error'] = "Tous les champs doivent être remplis.";
                header('Location: /CodeCoin/connexion');
                exit;
            }

            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['password']);

            $modelUtilisateur = new ModelUtilisateur();
            $utilisateur = $modelUtilisateur->getUtilisateurByEmail($email);

            if ($utilisateur && password_verify($password, $utilisateur->getPassword())) {
                $_SESSION['user'] = [
                    'id' => $utilisateur->getId(),
                    'pseudo' => $utilisateur->getPseudo(),
                    'email' => $utilisateur->getEmail(),
                    'created_at' => $utilisateur->getCreated_at()->format('Y-m-d H:i:s') 
                ];

                $_SESSION['success'] = "Connexion réussie !";
                header('Location: /CodeCoin/');
                exit;
            } else {
                $_SESSION['error'] = "Identifiants invalides.";
                header('Location: /CodeCoin/connexion');
                exit;
            }
        }

        require __DIR__ . '/../views/auth/connexion.php';
    }


    public function deconnexion()
    {
        // Supprimer toutes les données de session
        session_unset();
        session_destroy();

        // Redirection vers l'accueil
        header('Location: /CodeCoin/');
        exit;
    }
}
