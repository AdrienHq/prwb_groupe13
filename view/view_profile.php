<!DOCTYPE html>
<html>
    <?php require_once("view/blocks/head.html"); ?>
    <body>
        
        <?php require_once("view_navbar.html"); ?>

        <h2>Profil de <?= $user->pseudo ?></h2>
        <p>         
            <form id="signupForm" action="login/update" method="post">
                <td> Prénom : <input id="prenom" name="prenom" value="<?= $user->prenom ?>" type="text" size="16"></td><br/>
                <td> Nom :<input id="nom" name="nom" value="<?= $user->nom ?>" type="text" size="16"></td><br/>
                <td> Date de naissance : <input id="ddn" name="ddn" value="<?= $user->ddn ?>" type="text" size="16"></td><br/>
                <td> Adresse Mail :<input id="mail" name="mail" value="<?= $user->mail ?>" type="text" size="16"></td><br/>
                <td> Téléphone : <input id="tel" name="tel" value="<?= $user->tel ?>" type="text" size="16"></td><br/>
                <td> <input hidden id="id" name="id" value="<?= $user->id ?>" type="text" size="16"></td><br/>
                </td><input type="submit" value="Modifier mes infos"><br/>
                <p align="center">Modifiez un ou plusieurs champ(s) et cliquez sur 'Modifier' pour mettre à jour vos informations.</p>
            </form>
        </p>
        <form action="login/mdp">
            <input type="submit" value="Changer mon mot de passe">
        </form>
    </body>
</html>
