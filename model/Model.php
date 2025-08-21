<?php
// Déclaration d'une classe abstraite nommée Model
// On ne peut pas créer directement un objet de cette classe (elle sert de base à d'autres classes)
abstract class Model{
    // Propriété statique privée pour stocker la connexion à la base de données
    private static $db;

    private static function setDb(){
        try{
            // self::$db : fait référence à une propriété statique (ex: private static $db;) utilisée pour stocker la connexion PDO.
            self::$db = new PDO('mysql:host=localhost;dbname=codecoin;charset=utf8', 'root');
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    protected function getDb(){
        if(self::$db == null){
            self::setDb();
        }
        return self::$db;
    }
}