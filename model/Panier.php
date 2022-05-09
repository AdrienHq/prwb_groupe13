<?php

require_once 'framework/Model.php';
require_once 'model/Utilisateur.php';
require_once 'model/Panier.php';
require_once 'model/Produit.php';

class Panier extends Model {
    
    public $idu, $quantite, $idp;
    
    public function __construct($idu, $idp, $quantite) {
        $this->idu = $idu;
        $this->quantite = $quantite;
        $this->idp = $idp;
    }
    
    public function select_line ($idu, $idp) {
        $cmd = "SELECT * FROM panier WHERE idUser = ? AND idp = ?";
        $params = array($idu, $idp);
        $query = self::execute($cmd, $params);
        $res = $query->fetch();
        $panier = new Panier($res["idu"], $res["idp"], $res["quantite"]);
        return $panier;
    }
    
    public function add_line () {
        $cmd = " INSERT INTO panier (idu, quantite, idp) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quantite = quantite + ?";
        $params = array($this->idu, $this->quantite, $this->idp, $this->quantite);
        self::execute($cmd, $params);
        return true;
    }
    
    public function remove_line () {
        $cmd = "DELETE FROM panier WHERE idp = ? AND idu = ?";
        $params = array($this->idp, $this->idu);
        self::execute($cmd, $params);
        return true;
    }
    
    public static function delete_panier ($idu) {
        $cmd = "DELETE FROM panier WHERE idu = ?";
        $params = array($idu);
        self::execute($cmd, $params);
        return true;
    }
    
    public static function update_product($produit){
        $cmd = "UPDATE panier SET quantite = ? WHERE idp = ? ";
        $params = array($produit->idp);
        self::execute($cmd,$params);
        return true;
    }
    
    public static function select_panier ($idu) {
        $cmd = "SELECT produit.idp, label, descr, prix, photo, panier.quantite AS quantite "
                . "FROM produit "
                . "JOIN panier ON produit.idp = panier.idp "
                . "JOIN photo ON produit.idp = photo.productKey"
                . " WHERE panier.idu = ?";
        $params = array($idu);
        $query = self::execute($cmd, $params);
        $res = $query->fetchAll();
        $tabPanier = [];
        foreach ($res as $line) {
            $p = new Produit($line['idp'], $line['label'], $line['descr'], $line['prix'], $line['quantite'], $line['photo']);
            $tabPanier [] = $p;
        }
        return $tabPanier;
    }
    
    public static function count_products ($idu) {
        return count(Panier::select_panier($idu));
    }
    
    
}

?>
