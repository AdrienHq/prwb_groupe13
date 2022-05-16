<!DOCTYPE html>
<html>
    <?php require_once("view/blocks/head.html"); ?>
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
