<?php

require_once 'framework/Controller.php';
require_once 'model/Utilisateur.php';
require_once 'model/Categorie.php';
require_once 'model/Panier.php';


class ControllerLogin extends Controller {

    public function index () {
        if ($this->user_logged()) {
            $u = Utilisateur::select_user($_SESSION['user']);
            $u->password = "********";
            (new View("base"))->show();
        } else {
            $this->redirect("login", "login");
        }
    }
    
    public function login() {
        $pseudo = '';
        $password = '';
        $error = '';
        if (isset($_POST['pseudo']) && isset($_POST['password'])) {
            $pseudo = Tools::sanitize($_POST['pseudo']);
            $password = Tools::sanitize($_POST['password']);
            $user = Utilisateur::select_user($pseudo);
            if(isset($user)){
                if($this->check_password($password, $user->password)) {
                    $this->log_user($user->pseudo);
                } else {
                    $error = "Wrong password. Please try again.";
                }
            } else {
                $error = "Can't find a member with the pseudo '$pseudo'. Please sign up.";
            }
        }
        (new View("login"))->show(array("pseudo"=>$pseudo,"password"=>$password,"error"=>$error));
    }
    
    private function valid_signup($pseudo,$password,$password_confirm){
        $errors = [];
        $userExists = Utilisateur::exists($pseudo);
        if($userExists) {
            $errors[] = "This user already exists.";
        } if($pseudo == '') {
            $errors[] = "Pseudo is required.";
        } if(strlen($pseudo) < 3 || strlen($pseudo) > 16) {
            $errors[] = "Pseudo length must be between 3 and 16.";
        } if(!preg_match("/^[a-zA-Z][a-zA-Z0-9]*$/",$pseudo)) {
            $errors[] = "Pseudo must start by a letter and must contain only letters and numbers.";
        } if(strlen($password) < 8 || strlen($password) > 16) {
            $errors[] = "Password length must be between 3 and 16.";
        } if(!((preg_match("/[A-Z]/",$password)) && preg_match("/\d/",$password) && preg_match("/['\";:,.\/?\\-]/",$password))) {
            $errors[] = "Password must contain one uppercase letter, one number and one punctuation mark.";
        } if($password != $password_confirm) {
            $errors[] = "You have to enter the same password twice.";
        } 
        return $errors;
    }
     
    public function signup(){
        $nom = '';
        $prenom = '';
        $ddn = '';
        $pseudo = '';
        $password = '';
        $password_confirm = '';
        $mail = '';
        $tel = '';
        $errors = [];
        if(isset($_POST['pseudo'], $_POST['password'], $_POST['password_confirm'], $_POST['nom'], $_POST['prenom'], $_POST['jour'], $_POST['mois'], $_POST['annee'], $_POST['mail'], $_POST['tel'])) {
            $nom = trim($_POST['nom']);
            $prenom = trim($_POST['prenom']);
            $jour = trim($_POST['jour']);
            $mois = trim($_POST['mois']);
            $annee = trim($_POST['annee']);
            
            $ddn = $annee."-".$mois."-".$jour;
            
            $mail = trim($_POST['mail']);
            $tel = trim($_POST['tel']);
            $pseudo = trim($_POST['pseudo']);
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $errors = $this->valid_signup($pseudo,$password,$password_confirm);
            
            if(count($errors) == 0){
                $utilisateur = new Utilisateur($nom, $prenom, $ddn, $pseudo, $this->my_hash($password), $mail, $tel, false);
                Utilisateur::insert_user($utilisateur);
                $this->log_user($utilisateur->pseudo);
            }
        }
        (new View("signup"))->show(array("pseudo"=>$pseudo,"password"=>$password, "password_confirm"=>$password_confirm, "errors"=>$errors));
    }
    
    
    private function check_mdp($password,$password_confirm){
        $errors = [];
        if(strlen($password) < 8 || strlen($password) > 16) {
            $errors[] = "Password length must be between 3 and 16.";
        } if(!((preg_match("/[A-Z]/",$password)) && preg_match("/\d/",$password) && preg_match("/['\";:,.\/?\\-]/",$password))) {
            $errors[] = "Password must contain one uppercase letter, one number and one punctuation mark.";
        } if($password != $password_confirm) {
            $errors[] = "You have to enter the same password twice.";
        } 
        return $errors;
    }

    
    public function update() {
        
        if (isset($_POST['nom'],$_POST['prenom'],$_POST['ddn'],$_POST['mail'],$_POST['tel'],$_POST['id'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $ddn = $_POST['ddn'];
            $mail = $_POST['mail'];
            $tel = $_POST['tel'];
            $pseudo = $_SESSION['user'];
            $id = $_POST['id'];
            $user = Utilisateur::select_user($pseudo);
            
            if ($nom !== "")
                $user->nom = $nom;
            if ($prenom !== "")
                $user->prenom = $prenom;
            if ($ddn !== "")
                $user->ddn = $ddn;
            if ($mail !== "")
                $user->mail = $mail;
            if ($tel !== "")
                $user->tel = $tel;
            
            Utilisateur::update_user($user);
            (new View("profile"))->show(array("user"=>$user));
        }
    }
    
    public function mdp () {
        if ($this->user_logged()) {
            $u = Utilisateur::select_user($_SESSION['user']);
            $u->password = "********";
            (new View("mdp"))->show(array("user"=>$u));
        } else {
            $this->redirect("login", "login");
        }
    }
    
    public function password () {
        $pseudo = $_POST['pseudo'];
        $user = Utilisateur::select_user($pseudo);
        $error = "";
        if (isset($_POST['mdp_actuel'], $_POST['new_mdp'],$_POST['mdp_confirm'])) {
            if ($_POST['mdp_actuel'] === "" || $_POST['new_mdp'] === "" || $_POST['mdp_confirm'] === "") {
                $error = "Il manque une valeur.";
            } else {
                $actuel = Tools::sanitize($_POST['mdp_actuel']);
                $confirm = Tools::sanitize($_POST['mdp_confirm']);
                $new = Tools::sanitize($_POST['new_mdp']);
                if ($this->my_hash($actuel) !== $user->password) {
                    $error = "Le mot de passe actuel n'est pas correct.";
                } else if ($confirm === $new) {
                    $user->update_password($this->my_hash($new), $pseudo);
                } else {
                    $error = "Il y a une erreur dans le nouveau mot de passe";
                }
            }
        }
        (new View("mdp"))->show(array("user"=>$user,"error"=>$error));
    }
    
    public function check_member(){
        $res = "true";
        if (isset($_REQUEST['pseudo']))
        {
            $pseudo = sanitize($_REQUEST['pseudo']);
            $member = get_member($pseudo);
            $res = is_array($member) ? "false" : "true";
        }
        echo $res;
    }
    
    public function panier () {
        $pseudo = $this->get_user_or_redirect();
        $user = Utilisateur::select_user($pseudo);
        $panier = Panier::select_panier($user->id);
        (new View("panier"))->show(array("panier"=>$panier));
    }

}

?>
