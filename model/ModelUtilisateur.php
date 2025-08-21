<?php

class ModelUtilisateur extends Model
{

    public function createUtilisateur(string $pseudo, string $email, string $password): bool
    {
        // Vérifier si l'email existe déjà
        $check = $this->getDb()->prepare(
            'SELECT id FROM utilisateur WHERE email = :email'
        );
        $check->bindParam(':email', $email, PDO::PARAM_STR);
        $check->execute();

        if ($check->fetch()) {
            // Email déjà utilisé → retour false
            return false;
        }

        // Sinon on insère
        $req = $this->getDb()->prepare(
            'INSERT INTO utilisateur (pseudo, email, password, created_at) 
             VALUES (:pseudo, :email, :password, NOW())'
        );

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindParam(':email', $email, PDO::PARAM_STR);
        $req->bindParam(':password', $passwordHash, PDO::PARAM_STR);

        return $req->execute();
    }


    public function getUtilisateurByEmail(string $email): ?Utilisateur
    {
        $req = $this->getDb()->prepare('SELECT id, pseudo, email, password, created_at FROM utilisateur WHERE email = :email');
        $req->bindParam(':email', $email, PDO::PARAM_STR);
        $req->execute();

        $user = $req->fetch(PDO::FETCH_ASSOC);

        return $user ? new Utilisateur($user) : null;
    }


    public function emailExiste(string $email): bool
    {
        $req = $this->getDb()->prepare('SELECT id FROM utilisateur WHERE email = :email');
        $req->bindParam(':email', $email, PDO::PARAM_STR);
        $req->execute();

        return $req->fetch() !== false;
    }

}
