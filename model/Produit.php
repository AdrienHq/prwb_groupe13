<?php

class Produit extends Model {
    
    public $id, $label, $descr, $prix, $stock, $photo, $suppr;
    
    public function __construct($id, $label, $descr, $prix, $stock, $photo, $suppr=false) {
        $this->id = $id;
        $this->label = $label;
        $this->descr = $descr;
        $this->prix = $prix;
        $this->stock = $stock;
        $this->photo = $photo;
        $this->suppr = $suppr;
    }
    
    public static function insert_product ($p) {
        if (Utilisateur::is_admin($_SESSION["user"])) {
            $cmd = "INSERT INTO produit (label, descr, prix, stock) VALUES (?,?,?,?)";
            $params = array($p->label, $p->descr, $p->prix, $p->stock);
            self::execute($cmd,$params);
            return true;
        }
    }
    
    public static function delete_product ($prodId) {
        if (isset($userId[0])) {
            if (isset($_SESSION['user'])) {
                if (Utilisateur::is_admin($_SESSION["user"])) {
                    $place_holders = implode(',', array_fill(0, count($prodId), '?'));
                    $prodId = implode(',', $prodId);
                    $prodId .= ", " . $prodId;
                    $params = explode(',', $prodId);
                    $cmd = "UPDATE produit SET suppr = CASE WHEN idp IN ($place_holders) THEN true WHEN idp NOT IN ($place_holders) THEN false END;";
                    self::execute($cmd,$params);
                    return true;
                }
            }
        }
    }
    
    public static function select_product ($id) {
        $cmd = "SELECT * FROM produit JOIN photo ON produit.idp = photo.productKey"
                . " JOIN prodcat ON produit.idp = prodcat.idp WHERE produit.idp = ?";
        $params = array($id);
        $query = self::execute($cmd,$params);
        $res = $query->fetch();
        return (new Produit($res["idp"], $res["label"], $res["descr"], $res["prix"], $res["stock"], $res["photo"], $res["suppr"]));
    }
    
    public static function update_product ($id, $p) {
        $cmd = "UPDATE produit SET label = ?, descr = ?, prix = ?, stock = ? WHERE idp = ?";
        $params = array($p->label , $p->descr , $p->prix , $p->stock , $id);
        self::execute($cmd,$params);
        return true;
    }
    
    public static function select_all_products ($categorie, $all=false) {
        $cmd = "SELECT produit.idp, label, descr, prix, stock, photo, produit.suppr FROM produit JOIN photo ON produit.idp = photo.productKey";
        $params = array("");
        if ($categorie !== "") {
            $cmd .= " JOIN prodcat ON prodcat.idp = produit.idp"
                    . " JOIN categorie ON categorie.idc = prodcat.idc WHERE titre = ?";
            $params = array($categorie);
            if (!$all) {
                $cmd .= " AND produit.suppr = false";
            }
        } else if (!$all) {
            $cmd .= " WHERE produit.suppr = false";
        }
        $query = self::execute($cmd,$params);
        $res = $query->fetchAll();
        $tabProd = [];
        foreach ($res as $prod) {
            $p = new Produit($prod["idp"], $prod['label'], $prod['descr'], $prod['prix'], $prod['stock'], $prod['photo'], $prod["suppr"]);
            $tabProd [] = $p;
        }
        return $tabProd;
    }
    /*
    
        $cmd = "SELECT * FROM utilisateur";
        $params = array("");
        $query = self::execute($cmd,$params);
        $res = $query->fetchAll();
        $tabUsers = [];
        foreach ($res as $elem) {
            $u = new Utilisateur($elem['id'], $elem["nom"], $elem["prenom"], $elem["ddn"], $elem["pseudo"], $elem["mdp"], $elem["mail"], $elem["tel"], $elem["suppr"], $elem["admin"]);
            $tabUsers [] = $u;
        }
        return $tabUsers;
     * 
     */
    
    public static function select_products ($idp) {
        $place_holders = implode(',', array_fill(0, count($idp), '?'));
        $idp = implode(',', $idp);
        $idp .= ", " . $idp;
        $params = explode(',', $idp);
        $cmd = "SELECT label, prix, stock, photo FROM photo JOIN produit
        ON produit.idp = photo.productkey WHERE produit.idp IN ($place_holders)";
        $params = array($idp);
        $query = self::execute($cmd,$params);
        $res = $query->fetchAll();
        foreach ($res as $elem) {
            $p = new Produit($id, $label, $descr, $prix, $stock, $photo);
            $tabProd [] = $p;
        }
        return $tabProd;
    }
    
    public static function add_photo ($photo, $id) {
        $cmd = "INSERT INTO photo (photo, productKey) VALUES (?,?)";
        $params = array($photo, $id);
        $query = self::execute($cmd,$params);
        return true;
    }
            
}