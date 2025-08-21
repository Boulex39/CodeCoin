<?php

class Annonce{
   private int $id;
   private string $titre;
   private string $description;
   private int $prix;
   private int $categorie_id;
   private int $user_id;
   private string $categorie_nom;
//    private $image;
   private DateTimeImmutable $created_at;  

   


    public function __construct(array $datas){
        // $this->created_at = new \DateTimeImmutable();
        $this->hydrate($datas);
    }

    private function hydrate(array $datas){
        foreach ($datas as $key => $value){
            $method = 'set' . ucfirst($key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }   

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getPrix(): int {
    return $this->prix;
    }

    public function setPrix(int $prix): void {
    $this->prix = $prix;
    }

    public function getCategorie_id(): int {
    return $this->categorie_id;
    }

    public function setCategorie_id(int $categorie_id): void {
    $this->categorie_id = $categorie_id;
    }

    public function getUser_id(): int {
    return $this->user_id;
    }

    public function setUser_id(int $user_id): void {
    $this->user_id = $user_id;
    }

    public function getCategorie_nom(): string {
    return $this->categorie_nom;
    }

    public function setCategorie_nom(string $categorie_nom): void {
    $this->categorie_nom = $categorie_nom;
    }

    //  public function getImage(): string {
    //     return $this->image;
    // }

    // public function setImage(string $image): void {
    //     $this->image = $image;
    // }

    public function getCreated_at(): DateTimeImmutable {
    return $this->created_at;
    }

    public function setCreated_at(string $created_at): void {
    $this->created_at = new \DateTimeImmutable($created_at);
    }


}

