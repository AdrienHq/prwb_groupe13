<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style1.css">
        <script src="lib/jquery-2.2.0.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/panier.js"></script>
        <link href="lib/Jquery/jquery-ui-1.11.4/jquery-ui.theme.css" rel="stylesheet" type="text/css"/>
        <link href="lib/Jquery/jquery-ui-1.11.4/jquery-ui.structure.css" rel="stylesheet" type="text/css"/>
        <script src="lib/Jquery/jquery-ui-1.11.4/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="lib/Jquery/jquery-ui-1.11.4/jquery-ui.js" type="text/javascript"></script>
        <script src="lib/Jquery/jquery-validation-1.14.0/jquery.validate.js" type="text/javascript"></script>
        
        <script>
            $.validator.addMethod("regex", function (value, element, pattern) {
                if (pattern instanceof Array) {
                    for(p of pattern) {
                        if (!p.test(value))
                            return false;
                    }
                    return true;
                } else {
                    return pattern.test(value);
                }
            }, "Entrez des valeurs valables.");
            
            $.validator.addMethod ("Maj", function(value, element) {
                return this.optional(element) || /[A-Z]/.test(value);
            }, "Le password doit contenir une majuscule.");
    
            $.validator.addMethod ("Num", function(value, element) {
                return this.optional(element) || /\d/.test(value);
            }, "Le password doit contenir un numéro");
    
            $.validator.addMethod ("Ponctuation", function(value, element) {
                return this.optional(element) || /['\";:,.\/?\\-]/.test(value);
            }, "Le password doit contenir un symbole de ponctuation");
        

            $(function () {
                $('#signupForm').validate({
                    rules: {
                        nom: {
                            required: true,
                            minlength: 3,
                            maxlength: 20,
                        },
                        prenom: {
                            required: true,
                            minlength: 3,
                            maxlength: 20,                           
                        },
                        jour: {
                            required: true,
                        },
                        mois: {
                            required: true,
                        },
                        annee: {
                            required: true,
                        },
                        pseudo: {
                            required: true,
                            remote: {
                                url: "ControllerLogin/Valid_signup",
                                timeout: 2000,
                                type: "post"
                            },                         
                            minlength: 3,
                            maxlength: 16,
                            regex: /^[a-zA-Z][a-zA-Z0-9]*$/,
                        },
                        password: {
                            required: true,
                            minlength: 8,
                            maxlength: 16,
                            Maj: true,
                            Num: true,
                            Ponctuation: true, 
                        },
                        password_confirm: {
                            required: true,                         
                            equalTo: "#password",
                        },
                        mail: {
                            required: true,
                        },
                        tel: {
                            required: true,
                        },
                    },
                    messages: {
                        nom: {
                            required: 'Ce champ doit être rempli',
                            minlength: 'Le nom doit faire au minimum 3 lettres',
                            maxlength: 'Le nom peut faire au maximum 20 lettres',
                        },
                        prenom: {
                            required: 'Ce champ doit être rempli',
                            minlength: 'Le prénom doit faire au minimum 3 lettres',
                            maxlength: 'Le prénom peut faire au maximum 20 lettres',                           
                        },
                        jour: {
                            required: 'Ce champ doit être rempli',
                        },
                        mois: {
                            required: 'Ce champ doit être rempli',
                        },
                        annee: {
                            required: 'Ce champ doit être rempli',
                        },
                        pseudo: {
                            required: 'Ce champ doit être rempli',
                            remote: {
                                url: 'Pseudo déjà existant',
                                timeout: 'Session expirée',
                            },                         
                            minlength: 'Le pseudo doit faire au minimum 3 lettres',
                            maxlength: 'Le pseudo peut faire au maximum 20',
                            regex: 'Le pseudo doit commencer par une lettre et ne peut contenir que des lettres et des chiffres.',
                        },
                        password: {
                            required: 'Ce champ doit être rempli',
                            minlength: 'Le password doit contenir au moins 8 caractères',
                            maxlength: 'Le password peut contenir au moins 16 caractères',
                            Maj: 'Le password doit contenir au moins une majuscule',
                            Num: 'Le password doit contenir au moins un nombre',
                            Ponctuation: 'Le password doit contenir au moins un caractère de ponctuation',
                        },
                        password_confirm: {
                            required: 'Ce champ doit être rempli',                         
                            equalTo: 'La confirmation doit être égale au premier password',
                        },
                        mail: {
                            required: 'Ce champ doit être rempli',
                        },
                        tel: {
                            required: 'Ce champ doit être rempli',
                        },
                    },
                });
                $("input:text:first").focus();
            });
        </script>
        

    </head>
    <body>
        
        <?php require_once("view_navbar.html"); ?> 
        
        <div class="main">
            Veuillez remplir le formulaire pour vous enregistrer.
            <br><br>
            <form id="signupForm" action="view_signup.php" method="post" >
                <table>
                     <tr>
                        <td>Nom:</td>
                        <td><input id="nom" name="nom" type="text" size="16" value=""></td>
                        <td class="errors" id="errPseudo"></td>
                    </tr>
                    <tr>
                        <td>Prenom:</td>
                        <td><input id="prenom" name="prenom" type="text" size="16" value=""></td>
                        <td class="errors" id="errPseudo"></td>
                    </tr>
                    <tr>
                        <td>Date de naissance:</td>
                        <td><input id="ddnJour" name="jour" type="number" size="2" value="">
                        <input id="ddnMois" name="mois" type="number" size="2" value="">
                        <input id="ddnAnnee" name="annee" type="text" size="4" value=""></td>
                        <td class="errors" id="errPseudo"></td>
                    </tr>
                    <tr>
                        <td>Pseudo:</td>
                        <td><input id="pseudo" name="pseudo" type="text" size="16" value="" onchange=''></td>
                        <td class="errors" id="errPseudo"></td>
                    </tr>
                    
                    <tr>
                        <td>Mot de passe:</td>
                        <td><input id="password" name="password" type="password" size="16" value="" ></td>
                        <td class="errors" id="errPassword"></td>
                    </tr>
                    <tr>
                        <td>Confirmation du mot de passe:</td>
                        <td><input id="passwordConfirm" name="password_confirm" size="16" type="password" value="" ></td>
                        <td class="errors" id="errPasswordConfirm"></td>
                    </tr>
                    <tr>
                        <td>Mail:</td>
                        <td><input id="mail" name="mail" type="text" size="16" value=""></td>
                        <td class="errors" id="errPseudo"></td>
                    </tr>
                    <tr>
                        <td>Numéro de téléphone:</td>
                        <td><input id="tel" name="tel" type="text" size="16" value=""></td>
                        <td class="errors" id="errPseudo"></td>
                    </tr>
                </table>
                <input id="btn" type="submit" value="Sign Up">
            </form>
            <?php if(count($errors)!=0): ?>
                <div class='errors'>
                    <br><br><p>Veuillez corriger les erreurs suivantes:</p>
                    <ul>
                    <?php foreach($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </body>
</html>