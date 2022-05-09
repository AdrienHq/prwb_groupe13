<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bienvenue sur Projet13</title>
        <base href="<?= $web_root ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style1.css">
        <script type="text/javascript" src="js/panier.js"></script>
    </head>
    <body>
        
        <?php require_once("view_navbar.html"); ?>
        
        
        <p>         
            <form id="signupForm" action="login/password" method="post">
                <td> Mot de passe actuel <input id="mdp_actuel" name="mdp_actuel" value="" placeholder="********" type="password" size="16"></td><br/>
                <td> Nouveau mot de passe: <input id="new_mdp" name="new_mdp" value="" type="password" size="16"></td><br/>
                <td> Confirmation : <input id="mdp_confirm" name="mdp_confirm" value="" type="password" size="16"></td><br/>
                <td> <input hidden id="pseudo" name="pseudo" value="<?= $user->id ?>" type="text" size="16"></td><br/>
                </td><input type="submit" value="Modifier"><br/>
            </form>
        </p>
        
        <!--<?= '<div id="error">'.$error.'</div>' ?>-->
    </body>
</html>
