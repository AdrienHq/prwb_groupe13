<?php

require_once 'framework/Controller.php';
require_once 'model/Utilisateur.php';
require_once 'model/Categorie.php';
require_once 'model/Produit.php';

class ControllerAdmin extends Controller {

    public function index() {
        if ($this->user_logged()) {
            $pseudo = $_SESSION['user'];
            $users = $this->users();
            $prod = $this->products();
            //$cat = $this->categories();
            if (Utilisateur::is_admin($pseudo))
                (new View("admin"))->show(array("alluser"=>$users, "allProd"=>$prod));
            else
                $this->redirect("login", "index");
        } else {
            $this->redirect("login", "login");
        }
    }

    public function insert_user() {
        if ($this->is_admin($pseudo)) {
            $nom = '';
            $prenom = '';
            $ddn = '';
            $pseudo = '';
            $password = '';
            $password_confirm = '';
            $mail = '';
            $tel = '';
            $errors = [];
            if (isset($_POST['pseudo'], $_POST['password'], $_POST['password_confirm'], $_POST['nom'], $_POST['prenom'], $_POST['jour'], $_POST['mois'], $_POST['annee'], $_POST['mail'], $_POST['tel'])) {
                $nom = trim($_POST['nom']);
                $prenom = trim($_POST['prenom']);
                $jour = trim($_POST['jour']);
                $mois = trim($_POST['mois']);
                $annee = trim($_POST['annee']);

                $ddn = $annee . "-" . $mois . "-" . $jour;

                $mail = trim($_POST['mail']);
                $tel = trim($_POST['tel']);
                $pseudo = trim($_POST['pseudo']);
                $password = $_POST['password'];
                $password_confirm = $_POST['password_confirm'];
                //$errors = $this->valid_signup($pseudo, $password, $password_confirm);

                if (count($errors) == 0) {
                    $utilisateur = new Utilisateur($nom, $prenom, $ddn, $pseudo, $this->my_hash($password), $mail, $tel, false);
                    Utilisateur::insert_user($utilisateur);
                }
            }
            $this->index();
        }
    }

    private function valid_signup($pseudo, $password, $password_confirm) {
        $errors = [];
        $userExists = Utilisateur::exists($pseudo);
        if ($userExists) {
            $errors[] = "L'utilisateur existe déjà.";
        } if ($pseudo == '') {
            $errors[] = "Le pseudo est obligatoire.";
        } if (strlen($pseudo) < 3 || strlen($pseudo) > 16) {
            $errors[] = "La taille du pseudo doit être compris entre 3 et 16 caractères.";
        } if (!preg_match("/^[a-zA-Z][a-zA-Z0-9]*$/", $pseudo)) {
            $errors[] = "Le pseudo doit commencer par une lettre et ne peut contenir que des lettres et des chiffres.";
        } if (strlen($password) < 8 || strlen($password) > 16) {
            $errors[] = "La taille du mot de passe doit être compris entre 3 et 16 caractères.";
        } if (!((preg_match("/[A-Z]/", $password)) && preg_match("/\d/", $password) && preg_match("/['\";:,.\/?\\-]/", $password))) {
            $errors[] = "Le mot de passe doit contenir une lettre en majuscule, un nombre et un symbole de ponctuation.";
        } if ($password != $password_confirm) {
            $errors[] = "Vous devez insérer le mot de passe deux fois.";
        }
        return $errors;
    }

    public function users() {
        return Utilisateur::select_all_users();
    }
    
    public function products () {
        return Produit::select_all_products("",true);
    }

    public function delete_user() {
        if (isset($_POST)) {
            $suppr = $_POST;
            Utilisateur::delete_user($suppr);
            $this->index();
        }
    }

    public function delete_categorie() {
        if (isset($_POST['titre'])) {
            $titre = $_POST['titre'];
            $cat = new Categorie($titre);
            Categorie::delete_categorie($cat);
            $this->index();
        }
    }

    public function insert_categorie() {
        if (isset($_POST['titre'])) {
            $titre = $_POST['titre'];
            $cat = new Categorie($titre);
            Categorie::insert_categorie($cat);
            $this->index();
        }
    }

    
    public function insert_product() {
        $label = '';
        $descr = '';
        $prix = '';
        $stock = [];
        if (isset($_POST['label'], $_POST['descr'], $_POST['prix'], $_POST['stock'])) {
            $label = Tools::sanitize($_POST['label']);
            $descr = Tools::sanitize($_POST['descr']);
            $prix = Tools::sanitize($_POST['prix']);
            $stock = Tools::sanitize($_POST['stock']);
            $u = new produit($label, $descr, $prix, $stock);
            $product = Produit::insert_product($u);
            $this->index();
        }
    }
    
    
    public function delete_product() {
        if (isset($_POST)) {
            $suppr = $_POST;
            Produit::delete_product($suppr);
            $this->index();
        }
    }
    
    public function update_product () {
        if (isset ($_SESSION['user'])) {
            if (Utilisateur::is_admin($_SESSION['user'])) {
                if (isset($_POST['id'],$_POST['label'],$_POST['descr'],$_POST['prix'],$_POST['stock'],$_POST['photo'])) {
                    $id = $_POST['id'];
                    $label = $_POST['label'];
                    $descr = $_POST['descr'];
                    $prix = $_POST['prix'];
                    $stock = $_POST['stock'];
                    $photo = $_POST['photo'];
                    $newProd = Produit::select_product($id);

                    if ($label !== "")
                        $newProd->label = $label;
                    if ($descr !== "")
                        $newProd->descr = $descr;
                    if ($prix !== "")
                        $newProd->prix = $prix;
                    if ($stock !== "")
                        $newProd->stock = $stock;
                    if ($photo !== "")
                        $newProd->photo = $photo;

                    Produit::update_product($id, $newProd);
                    $this->index();
                }
            } else {
                $this->redirect("login", "index");
            }
        }
    }

    public function update_users () {
        print_r($_POST);die();
        if (isset($_SESSION['user'])) {
            
                
            if (Utilisateur::is_admin($_SESSION['user'])) {
            }
        } else {
            $this->redirect("login", "index");
        }
    }
    
    public function panier () {
        if (isset($_POST['idProd'],$_POST['action'])) {
            $idProd = Tools::sanitize($_POST['idProd']);
            $action = Tools::sanitize($_POST['action']);
        }
        $userId = $_SESSION['user'];
        if ($action === "add") {
            Panier::add_product();
       }
    }
}
