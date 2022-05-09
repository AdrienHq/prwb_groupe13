<?php

require_once 'framework/Model.php';

class Utilisateur extends Model {
    
    public $nom, $prenom, $ddn, $pseudo, $password, $mail, $tel, $flag, $id, $suppr, $admin;
    
    public function __construct($id, $nom, $prenom, $ddn, $pseudo, $password, $mail, $tel, $suppr=false, $admin=false) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->ddn = $ddn;
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->mail = $mail;
        $this->tel = $tel;
        $this->suppr = $suppr;
        $this->admin = $admin;
    }
    
    public static function insert_user ($u) {
        $cmd = "INSERT INTO utilisateur(nom,prenom,ddn,pseudo,mdp,mail,tel) VALUES (?,?,?,?,?,?,?)";
        $params = array($u->nom, $u->prenom, $u->ddn, $u->pseudo, $u->password, $u->mail, $u->tel);
        self::execute($cmd, $params);
        return true;
    }
    
    public static function delete_multiple_users ($array_users) {
        if (self::is_admin($_SESSION['user'])) {
            $place_holders = implode(',', array_fill(0, count($array_users), '?'));
            $cmd = "UPDATE utilisateur SET suppr = true WHERE id IN ($place_holders) AND admin = false";
            $params = implode(',',$array_users);
            self::execute($cmd, $params);
            return true;
        }
    }
    
    public static function delete_user ($userId) {
        if (isset($userId)) {
            if (self::is_admin($_SESSION['user'])) {
               $place_holders = implode(',', array_fill(0, count($userId), '?'));
               $userId = implode(',', $userId);
               $userId .= ", " . $userId;
               $params = explode(',', $userId);
               $cmd = "UPDATE utilisateur SET suppr = CASE WHEN id IN ($place_holders) THEN true WHEN id NOT IN ($place_holders) THEN false END;";
               //$cmd = "UPDATE utilisateur SET suppr = true WHERE id IN ($place_holders)";
               self::execute($cmd, $params);
               return true;
           }   
        }
    }
    
    public static function select_user ($pseudo) {
        $cmd = "SELECT * FROM utilisateur WHERE pseudo = ?";
        $params = array($pseudo);
        $query = self::execute($cmd,$params);
        $res = $query->fetch();
        $utilisateur = new Utilisateur($res['id'], $res["nom"], $res["prenom"], $res["ddn"], $res["pseudo"], $res["mdp"], $res["mail"], $res["tel"]);
        return $utilisateur;
    }
    
    public static function update_user ($u) {
        if (self::is_admin($_SESSION['user']) || $_SESSION['user'] === $u->pseudo) {
            $cmd = "UPDATE utilisateur SET nom = ? , prenom = ? , ddn = ? , mail = ? , tel = ? WHERE pseudo = ?";
            $params = array($u->nom, $u->prenom, $u->ddn, $u->mail, $u->tel, $u->pseudo);
            self::execute($cmd,$params);
            return true;
        }
    }
    
    public static function select_all_users () {
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
    }
    
    public static function exists ($pseudo) {
        $cmd = "SELECT COUNT(*) AS count FROM utilisateur WHERE pseudo = ? AND suppr = false";
        $params = array($pseudo);
        $query = self::execute($cmd, $params);
        return ($query->fetch()["count"] > 0);
    }
    
    public static function is_admin ($pseudo) {
        $cmd = "SELECT admin FROM utilisateur WHERE pseudo = ? AND suppr = false";
        $params = array($pseudo);
        $query = self::execute($cmd, $params);
        return $query->fetch()["admin"];
    }
    
    public function update_password ($mdp, $pseudo) {
        $cmd = "UPDATE utilisateur SET mdp = ? WHERE pseudo = ?";
        $params = array($mdp, $pseudo);
        self::execute($cmd,$params);
        return true;
    }
}


?>
