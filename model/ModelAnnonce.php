<?php

class ModelAnnonce extends Model {

    public function getAnnonces(): array {
        $sql = "SELECT a.id, a.titre, a.description, a.prix, a.created_at, a.user_id, 
                       a.categorie_id, c.nom AS categorie_nom
                FROM annonce a
                JOIN categorie c ON a.categorie_id = c.id
                ORDER BY a.created_at DESC";
        $query = $this->getDb()->query($sql);

        $arrayAnnonces = [];
        while ($annonce = $query->fetch(PDO::FETCH_ASSOC)) {
            $arrayAnnonces[] = new Annonce($annonce);
        }
        return $arrayAnnonces;
    }

    public function getAnnonceById(int $id): ?Annonce {
        $sql = "SELECT a.id, a.titre, a.description, a.prix, a.created_at, a.user_id, 
                       a.categorie_id, c.nom AS categorie_nom
                FROM annonce a
                JOIN categorie c ON a.categorie_id = c.id
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

    public function getAnnoncesByCategorieId(int $categorie_id): array {
        $sql = "SELECT a.id, a.titre, a.description, a.prix, a.created_at, a.user_id, 
                       a.categorie_id, c.nom AS categorie_nom
                FROM annonce a
                JOIN categorie c ON a.categorie_id = c.id
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
}