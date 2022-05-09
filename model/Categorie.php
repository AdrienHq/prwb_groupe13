<?php

require_once 'framework/Model.php';

class Categorie extends Model {
    public $titre;
    
    public function __construct($titre) {
        $this->titre = $titre;
    }
    
    public static function select_categorie ($categorie) {
        $titre = $categorie->titre;
        $cmd = "SELECT * FROM categorie WHERE titre = ?";
        $params = array($titre);
        $query = self::execute($cmd, $params);
        return $query->fetchAll();
    }
    
    public static function delete_categorie ($categorie) {
        $titre = $categorie->titre;
        $cmd = "DELETE FROM categorie WHERE titre = ?";
        $params = array($titre);
        self::execute($cmd, $params);
        return true;
    }
    
    public static function insert_categorie ($categorie) {
        $titre = $categorie->titre;
        $cmd = "INSERT INTO categorie (titre) VALUES (?)";
        $params = array($titre);
        self::execute($cmd, $params);
        return true;
    }
    
    public static function update_categorie ($categorie) {
        $titre = $categorie->titre;
        $id = $categorie->id;
        $cmd = "UPDATE categorie SET titre = ? WHERE titre = ?";
        $params = array($titre, $id);
        self::execute($cmd, $params);
        return true;
    }
    
    public static function select_all_categories () {
        $cmd = "SELECT titre FROM categorie";
        $params = array("");
        $query = self::execute($cmd, $params);
        $res = $query->fetchAll();
        $tabCat = [];
        foreach ($res as $cat) {
            $c = new Categorie($cat["titre"]);
            $tabCat [] = $c;
        }
        return $tabCat;
    }
}


?>



