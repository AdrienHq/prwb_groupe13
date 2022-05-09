<?php

require_once 'framework/Controller.php';
require_once 'model/Utilisateur.php';
require_once 'model/Produit.php';
require_once 'model/Categorie.php';

class ControllerProduit extends Controller {
    
    public function index () {
        if ($this->user_logged()) {
            (new View("index"))->show();
        } else {
            $this->redirect("login", "index");
        }
    }
    
    public function add_photo () {
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ''){
            if($_FILES['image']['error']==0){
                $typeOK = TRUE;
                if($_FILES['image']['type']=="image/gif")
                    $saveTo = $p->label.time().".gif";
                else if($_FILES['image']['type']=="image/jpeg")
                    $saveTo = $p->label.time().".jpg";
                else if($_FILES['image']['type']=="image/png")
                    $saveTo = $p->label.time().".png";
                else {
                    $typeOK = FALSE;
                    $error = "Supported image formats are : gif, jpg/jpeg or png.";
                }
                
                if($typeOK){
                    move_uploaded_file($_FILES['image']['tmp_name'], "upload/$saveTo");
                    Produit::add_photo($id,$photo);
                    $success = "Picture added to the product";
                }
            } else {
                $error = "Error while uploading file.";
            }
        }
    }
    
    public function produits () {
        $categorie = "";
        if (isset($_GET['cat'])) {
            $categorie = Tools::sanitize($_GET['cat']);
        }
        $productArray = Produit::select_all_products($categorie, false);
        (new View("produits"))->show(array("produits"=>$productArray));
    }
    
    public function produit () {
        if (isset($_GET['id'])) {
            $id = Tools::sanitize($_GET['id']);
            $product = Produit::select_product($id);
            (new View("produit"))->show(array("produit"=>$product));
        }
    }
    
}