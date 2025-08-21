<?php

class ModelAnnonce extends Model
{

    public function getAnnonces(): array
    {
        $sql = "SELECT a.id, a.titre, a.description, a.prix, a.created_at, a.user_id, 
                       a.categorie_id, c.nom AS categorie_nom, u.pseudo
                FROM annonce a
                JOIN categorie c ON a.categorie_id = c.id
                JOIN utilisateur u ON a.user_id = u.id
                ORDER BY a.created_at DESC";
        $query = $this->getDb()->query($sql);

        $arrayAnnonces = [];
        while ($annonce = $query->fetch(PDO::FETCH_ASSOC)) {
            $arrayAnnonces[] = new Annonce($annonce);
        }
        return $arrayAnnonces;
    }

    public function getAnnonceById(int $id): ?Annonce
    {
        $sql = "SELECT a.id, a.titre, a.description, a.prix, a.created_at, a.user_id, 
                       a.categorie_id, c.nom AS categorie_nom, u.pseudo
                FROM annonce a
                JOIN categorie c ON a.categorie_id = c.id
                JOIN utilisateur u ON a.user_id = u.id
                WHERE a.id = :id";
        $query = $this->getDb()->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new Annonce($data);
        }
        return null;
    }

    public function getAnnoncesByCategorieId(int $categorie_id): array
    {
        $sql = "SELECT a.id, a.titre, a.description, a.prix, a.created_at, a.user_id, 
                       a.categorie_id, c.nom AS categorie_nom, u.pseudo
                FROM annonce a
                JOIN categorie c ON a.categorie_id = c.id
                JOIN utilisateur u ON a.user_id = u.id
                WHERE a.categorie_id = :categorie_id
                ORDER BY a.created_at DESC";
        $query = $this->getDb()->prepare($sql);
        $query->bindValue(':categorie_id', $categorie_id, PDO::PARAM_INT);
        $query->execute();

        $arrayAnnonces = [];
        while ($annonce = $query->fetch(PDO::FETCH_ASSOC)) {
            $arrayAnnonces[] = new Annonce($annonce);
        }

        return $arrayAnnonces;
    }

    public function createAnnonce($titre, $description, $prix, $categorie_id, $user_id)
    {
        $sql = "INSERT INTO annonce (titre, description, prix, categorie_id, user_id, created_at)
            VALUES (:titre, :description, :prix, :categorie_id, :user_id, NOW())";
        $stmt = $this->getDb()->prepare($sql);

        return $stmt->execute([
            ':titre' => $titre,
            ':description' => $description,
            ':prix' => $prix,
            ':categorie_id' => $categorie_id,
            ':user_id' => $user_id
        ]);
    }

    
}
