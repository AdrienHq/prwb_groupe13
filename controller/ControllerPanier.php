<?php

require_once 'framework/Controller.php';
require_once 'model/Panier.php';
require_once 'model/Categorie.php';

class ControllerPanier extends Controller {
    
    public function index () {
        
    }
    
    public function panier(){
        $pseudo = ($this->get_user_or_redirect());
        $user = Utilisateur::select_user($pseudo);
        return Panier::select_panier($user->id);
    }
    
    public function add (){
        if (isset($_SESSION['user'])) {
            $pseudo = $_SESSION['user'];
            $u = Utilisateur::select_user($pseudo);
            $idu = $u->id;
        }
        if (isset($_POST['idp'])) {
            $idp = $_POST['idp'];
        }
        $qte = 1;
        $panier = new Panier($idu, $idp, $qte);
        if ($panier->add_line())
            echo $this->count();
    }
    
    public function remove(){
        if (isset($_POST['idp'])) {
            $idp = $_POST['idp'];
            $pseudo = $this->get_user_or_redirect();
            $user = Utilisateur::select_user($pseudo);
            $panier = new Panier($user->id, $idp, 0);
            $panier->remove_line();
            $this->count();
        }
    }
    
    public function delete(){
        $pseudo = $this->get_user_or_redirect();
        $user = Utilisateur::select_user($pseudo);
        Panier::delete_panier($user->id);
    }
    
    public function count () {
        $pseudo = $this->get_user_or_redirect();
        $user = Utilisateur::select_user($pseudo);
        $count = Panier::count_products($user->id);
        echo "(" . $count . ")";
    }
}