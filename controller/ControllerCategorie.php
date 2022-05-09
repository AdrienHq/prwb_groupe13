<?php

require_once 'framework/Controller.php';
require_once 'model/Utilisateur.php';
require_once 'model/Categorie.php';
require_once 'model/Produit.php';

class ControllerCategorie extends Controller {

    public function index () {
        
    }
    
    public function select_all_categories() {
        return Categorie::select_all_categories();
    }
   
}

?>

